@if(isset($video_id))
<script>
// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '200',
        width: '640',
        videoId: '{{ $video_id }}',
        playerVars: {
            'autoplay': 1,
        },
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange,
        }
    });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
    event.target.playVideo();
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
var done = false;

function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
        setTimeout(stopVideo, 0);
        done = true;
    }
}

function stopVideo() {
    player.stopVideo();
}
</script>
@endif


{{-- <script>
    var player;
    var playerParams = {
    height : '390',
    width : '640',
    videoId : 'JW5meKfy3fY',
    playerVars : {
        'autoplay' : 0,
        'rel' : 0,
        'showinfo' : 0,
        'egm' : 0,
        'showsearch' : 0,
        'controls' : 0,
        'modestbranding' : 1,
    },
    events : {
        'onReady' : onPlayerReady
,
        'onStateChange' : onPlayerStateChange
    }
}

window.onYouTubePlayerAPIReady = function() {
    player = new YT.Player('player', playerParams);

};

window.onPlayerReady = function(event) {
    //event.target.playVideo();
    loadNewVid("bHQqvYy5KYo");
};

window.onPlayerStateChange = function(event, element) {
    //When the video has ended
    if (event.data == YT.PlayerState.ENDED) {
        //Get rid of the player
        element.style.display = "none";
    }
};

function loadNewVid(vidID){
    player.destroy();
    playerParams.videoId = vidID;
    player = new YT.Player('player', playerParams);

}
</script> --}}
