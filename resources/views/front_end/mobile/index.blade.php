@extends('layouts.mobile')
@section('content')
<style>
	.m_left img:not(.icon-header){
		width: 173px;
		height: 116px;
	}
	.box_item_main img{
		width: 360px !important;
		/*height: 266px;*/
	}
</style>
<section class="wrapper">
    <div class="area_news_hot news_top">
    	@if(count($news) > 0)
        <div class="box_item_main">
            <div class="m_thumbnail m_text_center">
                <a href="{{route('m_getNewsDetail', ['slug' => $news[0]['slug'].'-'.$news[0]['id']])}}">
                    <img alt="{{$news[0]['name']}}" src="{{asset($news[0]['images'])}}"/>
                </a>
            </div>
            <a href="{{route('m_getNewsDetail', ['slug' => $news[0]['slug'].'-'.$news[0]['id']])}}">
                <p>
                    {{$news[0]['name']}}
                </p>
            </a>
        </div>
        @endif
        <?php 
        	array_shift($news);
        ?>
        <div class="list_box_item">
        	@foreach($news as $post)
            <div class="box_item m_left m_text_center">
                <div class="box_item_inner">
                    <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                        <img alt="{{$post['name']}}" src="{{asset($post['images'])}}"/>
                    </a>
                    <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                        <p>
                            {{$post['name']}}
                        </p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="clear_fix">
        </div>
    </div>
    <div class="area_news_live">
        <div class="area_title">
            <a href="{{route('m_getPageCategory', ['slug' => 'song-chat'])}}">
                <h2 class="m_text_upper">
                    Sống chất
                    <i aria-hidden="true" class="fa fa-chevron-right">
                    </i>
                </h2>
            </a>
        </div>
        @if(count($content['song-chat']) > 0)
        <div class="box_item_main">
            <div class="m_thumbnail m_text_center">
                <a href="{{url('m_getNewsDetail', ['slug' => $content['song-chat'][0]['slug'].'-'.$content['song-chat'][0]['id']])}}">
                    <img alt="{{$content['song-chat'][0]['name']}}" src="{{asset($content['song-chat'][0]['images'])}}"/>
                </a>
            </div>
            <a href="{{url('m_getNewsDetail', ['slug' => $content['song-chat'][0]['slug'].'-'.$content['song-chat'][0]['id']])}}">
                <p>
                    {{$content['song-chat'][0]['name']}}
                </p>
            </a>
        </div>
        @endif
        <?php 
        	$posts = $content['song-chat'];
        	array_shift($posts);
         ?>
        <div class="list_box_item">
        	@foreach($posts as $post)
            <div class="box_item_live">
                <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                    <h3>
                        {{$post['name']}}
                    </h3>
                </a>
                <div class="media_content">
                    <div class="m_left">
                        <div class="media">
                            <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                                <img alt="{{$post['name']}}" src="{{asset($post['images'])}}"/>
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <p>
							{{Illuminate\Support\Str::words($post['description'], 20, '...')}}
                        </p>
                    </div>
                    <div class="clear_fix">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="area_news_upshelf area_news_live">
        <div class="area_title">
            <a href="{{route('m_getPageCategory', ['slug' => 'tin-len-ke'])}}">
                <h2 class="m_text_upper">
                    Tin lên kệ
                    <i aria-hidden="true" class="fa fa-chevron-right">
                    </i>
                </h2>
            </a>
        </div>
        @if(count($content['tin-len-ke']) > 0)
        <div class="box_item_main">
            <div class="m_thumbnail m_text_center">
                <a href="{{route('m_getNewsDetail', ['slug' => $content['tin-len-ke'][0]['slug'].'-'.$content['tin-len-ke'][0]['id']])}}">
                    <img alt="{{$content['tin-len-ke'][0]['name']}}" src="{{asset($content['tin-len-ke'][0]['images'])}}"/>
                </a>
            </div>
            <a href="{{route('m_getNewsDetail', ['slug' => $content['tin-len-ke'][0]['slug'].'-'.$content['tin-len-ke'][0]['id']])}}">
                <p>
                    {{$content['tin-len-ke'][0]['name']}}
                </p>
            </a>
        </div>
        @endif
        <?php 
        	$posts = $content['tin-len-ke'];
        	array_shift($posts);
         ?>
        <div class="list_box_item">
        	@foreach($posts as $post)
            <div class="box_item_live">
                <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                    <h3>
                        {{$post['name']}}
                    </h3>
                </a>
                <div class="media_content">
                    <div class="m_left">
                        <div class="media">
                            <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                                <img alt="{{$post['name']}}" src="{{asset($post['images'])}}"/>
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <p>
							{{Illuminate\Support\Str::words($post['description'], 20, '...')}}
                        </p>
                    </div>
                    <div class="clear_fix">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="area_news_view area_news_live">
        <div class="area_title">
            <a href="{{route('m_getPageCategory', ['slug' => 'goc-nhin'])}}">
                <h2 class="m_text_upper">
                    Góc nhìn
                    <i aria-hidden="true" class="fa fa-chevron-right">
                    </i>
                </h2>
            </a>
        </div>
        @if(count($content['goc-nhin']) > 0)
        <div class="box_item_main">
            <div class="m_thumbnail m_text_center">
                <a href="{{route('m_getNewsDetail', ['slug' => $content['goc-nhin'][0]['slug'].'-'.$content['goc-nhin'][0]['id']])}}">
                    <img alt="{{$content['goc-nhin'][0]['name']}}" src="{{asset($content['goc-nhin'][0]['images'])}}"/>
                </a>
            </div>
            <a href="{{route('m_getNewsDetail', ['slug' => $content['goc-nhin'][0]['slug'].'-'.$content['goc-nhin'][0]['id']])}}">
                <p>
                    {{$content['goc-nhin'][0]['name']}}
                </p>
            </a>
        </div>
        @endif
        <?php 
        	$posts = $content['goc-nhin'];
        	array_shift($posts);
        	$a = array_splice($posts, 0, 2);
         ?>
        <div class="list_box_item">
        	@foreach($a as $post)
            <div class="box_item_live">
                <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                    <h3>
                        {{$post['name']}}
                    </h3>
                </a>
                <div class="media_content">
                    <div class="m_left">
                        <div class="media">
                            <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                                <img alt="{{$post['name']}}" src="{{asset($post['images'])}}"/>
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <p>
							{{Illuminate\Support\Str::words($post['description'], 20, '...')}}
						</p>
                    </div>
                    <div class="clear_fix">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="home_list_article">
            <ul>
            	@foreach($posts as $post)
                <div>
                    <li>
                        <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                            {{$post['name']}}
                        </a>
                    </li>
                </div>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="area_news_originative area_news_live">
        <div class="area_title">
            <a href="{{route('m_getPageCategory', ['slug' => 'sang-tao'])}}">
                <h2 class="m_text_upper">
                    Sáng tạo
                    <i aria-hidden="true" class="fa fa-chevron-right">
                    </i>
                </h2>
            </a>
        </div>
        @if(count($content['sang-tao']) > 0)
        <div class="box_item_main">
            <div class="m_thumbnail m_text_center">
                <a href="{{route('m_getNewsDetail', ['slug' => $content['sang-tao'][0]['slug'].'-'.$content['sang-tao'][0]['id']])}}">
                    <img alt="{{$content['sang-tao'][0]['name']}}" src="{{asset($content['sang-tao'][0]['images'])}}"/>
                </a>
            </div>
            <a href="{{route('m_getNewsDetail', ['slug' => $content['sang-tao'][0]['slug'].'-'.$content['sang-tao'][0]['id']])}}">
                <p>
                    {{$content['sang-tao'][0]['name']}}
                </p>
            </a>
        </div>
        @endif
        <?php 
        	$posts = $content['sang-tao'];
        	array_shift($posts);
        	$a = array_splice($posts, 0, 2);
         ?>
        <div class="list_box_item">
        	@foreach($a as $post)
            <div class="box_item_live">
                <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                    <h3>
                        {{$post['name']}}
                    </h3>
                </a>
                <div class="media_content">
                    <div class="m_left">
                        <div class="media">
                            <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                                <img alt="{{$post['name']}}" src="{{asset($post['images'])}}"/>
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <p>
                           {{Illuminate\Support\Str::words($post['description'], 20, '...')}}
                        </p>
                    </div>
                    <div class="clear_fix">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="home_list_article">
            <ul>
            	@foreach($posts as $post)
                <div>
                    <li>
                        <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                            {{$post['name']}}
                        </a>
                    </li>
                </div>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="area_news_technology area_news_live">
        <div class="area_title">
            <a href="{{route('m_getPageCategory', ['slug' => 'cong-nghe'])}}">
                <h2 class="m_text_upper">
                    Công nghệ
                    <i aria-hidden="true" class="fa fa-chevron-right">
                    </i>
                </h2>
            </a>
        </div>
        @if(count($content['cong-nghe']) > 0)
        <div class="box_item_main">
            <div class="m_thumbnail m_text_center">
                <a href="{{route('m_getNewsDetail', ['slug' => $content['cong-nghe'][0]['slug'].'-'.$content['cong-nghe'][0]['id']])}}">
                    <img alt="{{$content['cong-nghe'][0]['name']}}" src="{{asset($content['cong-nghe'][0]['images'])}}"/>
                </a>
            </div>
            <a href="{{route('m_getNewsDetail', ['slug' => $content['cong-nghe'][0]['slug'].'-'.$content['cong-nghe'][0]['id']])}}">
                <p>
                    {{$content['cong-nghe'][0]['name']}}
                </p>
            </a>
        </div>
        @endif
        <?php 
        	$posts = $content['cong-nghe'];
        	array_shift($posts);
        	$a = array_splice($posts, 0, 2);
         ?>
        <div class="list_box_item">
        	@foreach($a as $post)
            <div class="box_item_live">
                <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                    <h3>
                        {{$post['name']}}
                    </h3>
                </a>
                <div class="media_content">
                    <div class="m_left">
                        <div class="media">
                            <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                                <img alt="{{$post['name']}}" src="{{asset($post['images'])}}"/>
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <p>
                            {{Illuminate\Support\Str::words($post['description'], 20, '...')}}
                        </p>
                    </div>
                    <div class="clear_fix">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="home_list_article">
            <ul>
            	@foreach($posts as $post)
                <div>
                    <li>
                        <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                            {{$post['name']}}
                        </a>
                    </li>
                </div>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="area_news_entertainment area_news_live">
        <div class="area_title">
            <a href="{{route('m_getPageCategory', ['slug' => 'giai-tri'])}}">
                <h2 class="m_text_upper">
                    Giải trí
                    <i aria-hidden="true" class="fa fa-chevron-right">
                    </i>
                </h2>
            </a>
        </div>
        @if(count($content['giai-tri']) > 0)
        <div class="box_item_main">
            <div class="m_thumbnail m_text_center">
                <a href="{{route('m_getNewsDetail', ['slug' => $content['giai-tri'][0]['slug'].'-'.$content['giai-tri'][0]['id']])}}">
                    <img alt="{{$content['giai-tri'][0]['name']}}" src="{{asset($content['giai-tri'][0]['images'])}}"/>
                </a>
            </div>
            <a href="{{route('m_getNewsDetail', ['slug' => $content['giai-tri'][0]['slug'].'-'.$content['giai-tri'][0]['id']])}}">
                <p>
                    {{$content['giai-tri'][0]['name']}}
                </p>
            </a>
        </div>
        @endif
        <?php 
        	$posts = $content['giai-tri'];
        	array_shift($posts);
        	$a = array_splice($posts, 0, 2);
         ?>
        <div class="list_box_item">
        	@foreach($a as $post)
            <div class="box_item_live">
                <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                    <h3>
                        {{$post['name']}}
                    </h3>
                </a>
                <div class="media_content">
                    <div class="m_left">
                        <div class="media">
                            <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                                <img alt="{{$post['name']}}" src="{{asset($post['images'])}}"/>
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <p>
                            {{Illuminate\Support\Str::words($post['description'], 20, '...')}}
                        </p>
                    </div>
                    <div class="clear_fix">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="home_list_article">
            <ul>
            	@foreach($posts as $post)
                <div>
                    <li>
                        <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                            {{$post['name']}}
                        </a>
                    </li>
                </div>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="area_news_video area_news_live">
        <div class="area_title">
            <a href="">
                <h2 class="m_text_upper">
                    Video
                    <i aria-hidden="true" class="fa fa-chevron-right">
                    </i>
                </h2>
            </a>
        </div>
        @if(isset($videos))
        @if(count($videos) != 0)
        <div class="box_item_main">
            <iframe allowfullscreen="" frameborder="0" src="https://www.youtube.com/embed/{{$videos[0]['url']}}" width="100%">
            </iframe>
            <a href="{{route('m_getNewsDetail', ['slug' => $videos[0]['slug'].'-'.$videos[0]['id']])}}">
                <p>
                    {{$videos[0]['name']}}
                </p>
            </a>
        </div>
        @endif
        <?php 
            array_shift($videos);
        ?>
        <div class="home_list_article">
            <ul>
                @foreach($videos as $v)
                <div>
                    <li>
                        <a href="{{route('m_getNewsDetail', ['slug' => $v['slug'].'-'.$v['id']])}}">
                            {{$v['name']}}
                        </a>
                    </li>
                </div>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="area_news_reporting area_news_video area_news_live">
        <div class="area_title">
            <a href="{{route('m_getPageCategory', ['slug' => 'phong-su-anh'])}}">
                <h2 class="m_text_upper">
                    Phóng sự ảnh
                    <i aria-hidden="true" class="fa fa-chevron-right">
                    </i>
                </h2>
            </a>
        </div>
        @if(count($content['phong-su-anh']) > 0)
        <div class="box_item_main">
            <div class="m_thumbnail m_text_center">
                <a href="{{url('m_getNewsDetail', ['slug' => $content['phong-su-anh'][0]['slug'].'-'.$content['phong-su-anh'][0]['id']])}}">
                    <img alt="{{$content['phong-su-anh'][0]['name']}}" src="{{asset($content['phong-su-anh'][0]['images'])}}"/>
                </a>
            </div>
            <a href="{{url('m_getNewsDetail', ['slug' => $content['phong-su-anh'][0]['slug'].'-'.$content['phong-su-anh'][0]['id']])}}">
                <p>
                    {{$content['phong-su-anh'][0]['name']}}
                </p>
            </a>
        </div>
        @endif
        <?php 
        	$posts = $content['phong-su-anh'];
        	array_shift($posts);
        ?>
        <div class="home_list_article">
            <ul>
            	@foreach($posts as $post)
                <div>
                    <li>
                        <a href="{{route('m_getNewsDetail', ['slug' => $post['slug'].'-'.$post['id']])}}">
                            {{$post['name']}}
                        </a>
                    </li>
                </div>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endsection
