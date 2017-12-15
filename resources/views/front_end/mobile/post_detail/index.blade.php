@extends('layouts.mobile')
@section('content')

<nav class="sub_menu">
    <ul>
		<?php if (count($sub_menu) > 0) { ?>
			<?php for ($i = 0; $i < count($sub_menu); $i++) { ?>
				<li <?php if ($active == $sub_menu[$i]['slug']) { ?> class="atv-menu" <?php } ?> >
					<a href="{{route('m_getPageCategory', ['slug' => $sub_menu[$i]['slug']])}}">{{$sub_menu[$i]['name']}}</a>
				</li>
			<?php }
		} ?>
    </ul>
    <div class="clear_fix"></div>
</nav>
<section class="wrapper wrapper_cate_live">
    @if(isset($post_detail))
    <div class="area_content_detail">
        <h2>
            {!! $post_detail->name !!}
        </h2>
        <div class="area_info">
            <span class="m_w20">
                <img alt="" src="{{ url('assets/images/img/page-detail-author.png') }}">
				{!! isset($author) ? $author->name : "Admin" !!}
                </img>
            </span>
            <span class="m_w40">
                <img alt="" src="{{ url('assets/images/img/page-detail-time.png') }}">
				{{ postTimer($post_detail->created_at) }}
				<?php
//				echo \App\Http\Controllers\FrontEnd\PostsDetailController::timeago(date($post_detail->
//								created_at));
				?>
                </img>
            </span>
            <p class="m_w40">
			<div class="fb-like" data-action="like" data-href="http://songmoi.vn/<?php echo $post_detail->slug . '.html'; ?>" data-layout="button_count" data-share="true" data-show-faces="true" data-size="small">
			</div>
            </p>
        </div>
        @if(isset($post_detail->url))
        <div class="video-container">
            <iframe allowfullscreen="" frameborder="0" src="https://www.youtube.com/embed/<?php echo $post_detail->url; ?>">
            </iframe>
        </div>
        @endif
        <div class="main_content_detail">
            <p class="desc_article_top">
                {!! $post_detail->description !!}
            </p>
            <div class="content detail-content">
                <span class="detail-content-sp">{!! $post_detail->content !!}</span>
                {!! $post_detail->author ? '<p style="text-align: right !important;">'.$post_detail->author.'</p>': '' !!}
                {!! $post_detail->source ? '<p style="text-align: right !important;">'.$post_detail->source.'</p>': '' !!}
            </div>
        </div>
    </div>
    @endif
    @if(isset($tags))
    <div class="area_keyword_article">
        @if(count($arr_meta_keyword) != 0)
        <div class="area_keyword_left">
            <span class="title_keyword">
                Từ khóa:
            </span>
				<?php for ($i = 0; $i < count($arr_meta_keyword); $i++) { ?>
	            <a href="#">
				<?php echo $arr_meta_keyword[$i]; ?>
	            </a>
<?php } ?>
        </div>
        @endif
        <div class="area_keyword_right">
            @foreach($tags as $tags_val)
            <a href="{{ URL::route('m_getPageTag', $tags_val->slug) }}">
                <span class="keyword">
                    {!! $tags_val->name !!}
                </span>
            </a>
            @endforeach
        </div>
        <div class="clear_fix">
        </div>
    </div>
    @endif
    <div class="area_comment_article">
        <h5>
            Bình luận
        </h5>
        <div class="content_comment_article">
            <div class="fb-comments" data-href="http://songmoi.vn/<?php echo $post_detail->slug . '.html'; ?>" data-numposts="5">
            </div>
        </div>
        <div class="clear_fix">
        </div>
    </div>
    @include('front_end.mobile.partials.sidebar_detail')
    <!-- cmt fb -->
    <div id="fb-root">
    </div>
    <script>
		(function (d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id))
				return;
			js = d.createElement(s);
			js.id = id;
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
    @endsection

    @include('front_end.mobile._partial.ad', ['ad' => $ads])
</section>