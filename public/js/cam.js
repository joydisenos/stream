/*

Simple RTC frame (F)

var webrtc = new SimpleWebRTC({
  localVideoEl: 'camera-stream',
  remoteVideosEl: '', // empty string
  autoRequestMedia: true
});

// a peer video has been added
webrtc.on('videoAdded', function (video, peer) {
    console.log('video added', peer);
    var remotes = document.getElementById('remotesVideos');
    if (remotes) {
        var container = document.createElement('div');
        container.className = 'videoContainer';
        container.id = 'container_' + webrtc.getDomId(peer);
        container.appendChild(video);

        // suppress contextmenu
        video.oncontextmenu = function () { return false; };

        remotes.appendChild(container);
    }
});

// a peer video was removed
webrtc.on('videoRemoved', function (video, peer) {
    console.log('video removed ', peer);
    var remotes = document.getElementById('remotesVideos');
    var el = document.getElementById(peer ? 'container_' + webrtc.getDomId(peer) : 'localScreenContainer');
    if (remotes && el) {
        remotes.removeChild(el);
    }
});

  
 */

 // a default configuration that is used by the rtc package
module.exports = {
  // simple constraints for defaults
  constraints: {
    video: true,
    audio: true
  },

  // use the public switchboard for signalling
  signaller: 'https://switchboard.rtc.io',

  // no room is defined by default
  // rtc-quickconnect will autogenerate using a location.hash
  room: undefined,

  // specify ice servers or a generator function to create ice servers
  ice: [],

  // any data channels that we want to create for the conference
  // by default a chat channel is created, but other channels can be added also
  // additionally options can be supplied to customize the data channel config
  // see: <http://w3c.github.io/webrtc-pc/#idl-def-RTCDataChannelInit>
  channels: {
    chat: true
  },

  // the selector that will be used to identify the localvideo container
  localContainer: '#l-video',

  // the selector that will be used to identify the remotevideo container
  remoteContainer: '#r-video',

  // should we atempt to load any plugins?
  plugins: [],

  // common options overrides that are used across rtc.io packages
  options: {}
};


  var quickconnect = require('rtc-quickconnect');
var crel = require('crel');
var getUserMedia = require('getusermedia');
var attachmediastream = require('attachmediastream');
var qsa = require('fdom/qsa');

// create containers for our local and remote video
var local = crel('div', { class: 'local' });
var remote = crel('div', { class: 'remote' });
var peerMedia = {};

// once media is captured, connect
getUserMedia({ audio: true, video: true }, function(err, localStream) {
  if (err) {
    return console.error('could not capture media: ', err);
  }

  // render the local media
  local.appendChild(attachmediastream(localStream));

  // initiate connection
  quickconnect('https://switchboard.rtc.io/', { room: 'conftest' })
    // broadcast our captured media to other participants in the room
    .addStream(localStream)
    // when a peer is connected (and active) pass it to us for use
    .on('call:started', function(id, pc, data) {
      var videos = pc.getRemoteStreams().map(attachmediastream);
      videos.forEach(function(video) {
        video.dataset.peer = id;
        remote.appendChild(video);
      });
    })
    // when a peer leaves, remove teh media
    .on('call:ended', function(id) {
      qsa('*[data-peer="' + id + '"]', remote).forEach(function(el) {
        el.parentNode.removeChild(el);
      });
    });
});

/* extra code to handle dynamic html and css creation */

// add some basic styling
document.head.appendChild(crel('style', [
  '.local { position: absolute;  right: 10px; }',
  '.local video { max-width: 200px; }'
].join('\n')));

// add the local and remote elements
document.body.appendChild(local);
document.body.appendChild(remote);