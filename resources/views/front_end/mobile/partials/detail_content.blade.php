<section class="wrapper wrapper_cate_live">
    @if(isset($post_detail))
    <div class="area_content_detail">
        <h2>{!! $post_detail->name !!}</h2>
        <div class="area_info">
            <span class="m_w20"><img src="{{ url('assets/images/img/page-detail-author.png') }}" alt="">{!! isset($author) ? $author->name : "Admin" !!}</span>
            <span class="m_w40"><img src="{{ url('assets/images/img/page-detail-time.png') }}" alt="">
             <?php
                echo \App\Http\Controllers\FrontEnd\PostsDetailController::timeago(date($post_detail->created_at));
            ?>
            </span>
            <span class="m_w40">
				 <div class="fb-like" data-href="http://songmoi.vn/<?php echo $post_detail->slug.'.html'; ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
			</span>
        </div>
        @if(isset($post_detail->url))
            <div class="video-container">
                <iframe  src="https://www.youtube.com/embed/<?php echo $post_detail->url; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        @endif
        <div class="main_content_detail">
            <p class="desc_article_top">{!! $post_detail->description !!}</p>
            <div class="content">
            	{!! $post_detail->content !!}
            </div>
        </div>
    </div>
    @endif
    @if(isset($tags))
    <div class="area_keyword_article">
      @if(count($arr_meta_keyword) != 0)
        <div class="area_keyword_left"><span class="title_keyword">Từ khóa:</span>
            <?php for ($i=0; $i < count($arr_meta_keyword); $i++) { ?>
                <a href="#">
                   <?php echo $arr_meta_keyword[$i]; ?>
                </a>
            <?php } ?>
        </div>
        @endif
        <div class="area_keyword_right">
            @foreach($tags as $tags_val)
                <a href="{{ URL::route('getNewsTagMb', $tags_val->slug) }}">
                   <span class="keyword">{!! $tags_val->name !!}</span>
                </a>
            @endforeach
        </div>
        <div class="clear_fix"></div>
    </div>
    @endif
    <div class="area_comment_article">
        <h4>Bình luận</h4>
        <div class="content_comment_article">
           <div class="fb-comments" data-href="http://songmoi.vn/<?php echo $post_detail->slug.'.html'; ?>" data-numposts="5"></div>
        </div>
        <div class="clear_fix"></div>
    </div>
@include('front_end.mobile.partials.sidebar_detail')


<!-- cmt fb -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=272807766472266";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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