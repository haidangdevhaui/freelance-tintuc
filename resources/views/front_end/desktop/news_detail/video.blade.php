@extends('layouts.desktop')
@section('content')
<div class="w-content">
    <div class="content">
        <div class="primary">
            <div class="life-detail-content">
                <h3 class="name-article">
                    {{$post_detail->name}}
                </h3>
                <div class="row life-detail-auth">
                    <div class="pull-left">
                        <span class="name-auth">
                            {{$post_detail->author}}
                        </span>
                        <span class="time-create">
                            <i class="fa fa-clock-o">
                            </i>
                            <?php
                                echo \App\Http\Controllers\FrontEnd\PostsDetailController::timeago(date($post_detail->
                            created_at));
                                ?>
                        </span>
                    </div>
                    <div class="pull-right print">
                        <a href="javascript:window.print()">
                            <span>
                            </span>
                            In bài viết
                        </a>
                    </div>
                </div>
                <div class="life-like">
                    <div class="fb-like" data-action="like" data-href="http://songmoi.vn/<?php echo $post_detail->slug.'.html'; ?>" data-layout="standard" data-share="true" data-show-faces="true" data-size="small">
                    </div>
                </div>

                <div class="modal fade" id="modal-id">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                        </div>
                    </div>
                </div>

                <div class="video-container">
                    <div id="player"></div>
                    <script>
                        // 2. This code loads the IFrame Player API code asynchronously.
                        var tag = document.createElement('script');

                        tag.src = "https://www.youtube.com/iframe_api";
                        var firstScriptTag = document.getElementsByTagName('script')[0];
                        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                        var player;

                        function onYouTubeIframeAPIReady() {
                            player = new YT.Player('player', {
                              height: '100%',
                              width: '100%',
                              videoId: '{{$post_detail->url}}',
                              events: {
                                'onReady': onPlayerReady,
                                'onStateChange': onPlayerStateChange
                              }
                            });
                        }

                        function onPlayerReady(event) {
                            // console.log(1);
                            // event.target.playVideo();
                        }
                        var done = false;
                        function onPlayerStateChange(event) {
                            if (event.data == YT.PlayerState.PLAYING && !done) {
                                $('#player').appendTo('.modal-content');
                                $('#modal-id').modal();
                                player.playVideoAt(player.getCurrentTime());
                                done = true;
                            }

                        }
                        function stopVideo() {
                            player.stopVideo();
                        }
                        
                        $('#modal-id').on('hidden.bs.modal', function () {
                            $('#player').appendTo('.video-container');
                            player.playVideoAt(player.getCurrentTime());
                        })
                    </script>
                </div>
                <div class="tag row" style="margin-top: 10px;">
                    <span>
                        Từ Khóa :
                    </span>
                    @foreach(explode(',', $post_detail->tag) as $tag)
                        @if($tag != '')
                    <a href="{{url('tag/'.$tag)}}">
                        {{ $tag }}
                    </a>
                    @endif
                        @endforeach
                </div>
                <div class="comment">
                    <div class="content-comment-article">
                        <div class="row total-comment">
                            <div class="fb-comments" data-href="http://songmoi.vn/<?php echo $post_detail->slug.'.html'; ?>" data-numposts="5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar">
            @include('front_end._partial.side_bar')
            <!-- Care -->
        </div>
        <div class="news-good">
            <div class="title">
                <h3>
                    Video trên songmoi.vn
                </h3>
            </div>
            <?php $i = 0;?>
            @foreach($list_videos as $video )
            <?php $i++; ?>
            <a href="{{url($video->slug).'.html'}}">
                <div class="new-good">
                    <div class="video-container">
                        <iframe allowfullscreen="" frameborder="0" src="https://www.youtube.com/embed/<?php echo $video->url; ?>">
                        </iframe>
                    </div>
                    <h3>
                        {{$video->name}}
                    </h3>
                </div>
            </a>
            @if($i==4)
            <div class="clear" style="clear:both">
            </div>
            @endif
                @endforeach
        </div>
    </div>
</div>
@endsection
<!-- cmt fb -->
<div id="fb-root">
</div>
<script>
    (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=272807766472266";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!-- like and share fb -->
<style>
    .video-container {
    position:relative;
    margin-top: 10px;
    padding-bottom:56.25%;
    padding-top:30px;
    height:0;
    overflow:hidden;
}

.video-container iframe, .video-container object, .video-container embed {
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
}
</style>