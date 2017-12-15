@extends('layouts.mobile')
@section('content')
<style>
	.box_item_inner img{
		height: 110px;
	}
	.item img{
		height: 150px !important;
	}
	.sub_menu{
		margin-left: 7px;
	}
</style>
		<nav class="sub_menu">
			<ul>
				<?php if(count($sub_menu) > 0){ ?>
					<?php for ($i=0; $i < count($sub_menu); $i++) {  ?>
						<li <?php if($active == $sub_menu[$i]['slug']) { ?> class="atv-menu" <?php } ?> >
							<a href="{{route('m_getPageCategory', ['slug' => $sub_menu[$i]['slug']])}}">{{$sub_menu[$i]['name']}}</a>
						</li>
				<?php } }?>
			</ul>
			<div class="clear_fix"></div>
		</nav>
		<section class="wrapper wrapper_cate_live">
			<div class="area_news_hot news_top">
				<?php if(count($post_fulls) > 0) { ?>
					<div class="box_item_main">
						<div class="m_thumbnail m_text_center">
							<a href="{{route('m_getNewsDetail', ['slug' => $post_fulls[0]['slug'].'-'.$post_fulls[0]['id']])}}">
							<img src="{{asset($post_fulls[0]['images'])}}" alt="{{$post_fulls[0]['name']}}" style="width: 100%">
							</a>
						</div>
						<a href="{{route('m_getNewsDetail', ['slug' => $post_fulls[0]['slug'].'-'.$post_fulls[0]['id']])}}">
							<p>{{$post_fulls[0]['name']}}</p>
						</a>
					</div>
				<?php } ?>
				<div class="list_box_item">
					<?php if(count($post_fulls) > 1) { ?>
						<div class="box_item m_left m_text_center">
							<div class="box_item_inner">
								<a href="{{route('m_getNewsDetail', ['slug' => $post_fulls[1]['slug'].'-'.$post_fulls[1]['id']])}}">
									<img src="{{asset($post_fulls[1]['images'])}}" alt="{{$post_fulls[1]['name']}}">
								</a>
								<a href="{{route('m_getNewsDetail', ['slug' => $post_fulls[1]['slug'].'-'.$post_fulls[1]['id']])}}">
									<p>{{Illuminate\Support\Str::words($post_fulls[1]['name'], 20, '...')}}</p>
								</a>
							</div>
						</div>
					<?php } ?>
					<?php if(count($post_fulls) > 2) { ?>
						<div class="box_item m_left m_text_center">
							<div class="box_item_inner">
								<a href="{{route('m_getNewsDetail', $post_fulls[2]['slug'].'-'.$post_fulls[2]['id'])}}"><img src="{{asset($post_fulls[2]['images'])}}" alt="{{$post_fulls[2]['name']}}"></a>
								<a href="{{route('m_getNewsDetail', $post_fulls[2]['slug'].'-'.$post_fulls[2]['id'])}}">
									<p>{{Illuminate\Support\Str::words($post_fulls[2]['name'], 20, '...')}}</p>
								</a>
							</div>
						</div>
					<?php } ?>
					<?php if(count($post_fulls) > 3) { ?>
						<div class="box_item m_left m_text_center">
							<div class="box_item_inner">
								<a href="{{route('m_getNewsDetail', $post_fulls[3]['slug'].'-'.$post_fulls[3]['id'])}}"><img src="{{asset($post_fulls[3]['images'])}}" alt="{{$post_fulls[3]['name']}}"></a>
								<a href="{{route('m_getNewsDetail', $post_fulls[3]['slug'].'-'.$post_fulls[3]['id'])}}">
									<p>{{Illuminate\Support\Str::words($post_fulls[3]['name'], 20, '...')}}</p>
								</a>
							</div>
						</div>
					<?php } ?>
					<?php if(count($post_fulls) > 4) { ?>
						<div class="box_item m_left m_text_center">
							<div class="box_item_inner">
								<a href="{{route('m_getNewsDetail', $post_fulls[4]['slug'].'-'.$post_fulls[4]['id'])}}"><img src="{{asset($post_fulls[4]['images'])}}" alt="{{$post_fulls[4]['name']}}"></a>
								<a href="{{route('m_getNewsDetail', $post_fulls[4]['slug'].'-'.$post_fulls[4]['id'])}}">
									<p>{{Illuminate\Support\Str::words($post_fulls[4]['name'], 20, '...')}}</p>
								</a>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="clear_fix"></div>
			</div>
			<div class="area_box_tab">
				<div class="box_tab">
					<ul>
						<li class="tab tab_new tab_active" show="content_tab_new"><a>Mới nhất</a></li>
						<li class="tab tab_hot" show="content_tab_hot"><a>Đọc nhiều</a></li>
					</ul>
					<div class="clear_fix"></div>
				</div>
				<div class="box_content_tab">
					<section class="content_tab content_tab_new">
						<section id="demos">
					      <div class="row">
					        <div class="large-12 ">
					          <div class="loop owl-carousel owl-theme">
								<?php if(count($side_bar['newest']) > 0) { ?>
									<?php for ($i=0; $i < count($side_bar['newest']); $i++) {  ?>
							            <div class="item" >
							              <a href="{{route('m_getNewsDetail', $side_bar['newest'][$i]['slug'].'-'.$side_bar['newest'][$i]['id'])}}">
							              	<img src="{{asset($side_bar['newest'][$i]['images'])}}" alt="{{$side_bar['newest'][$i]['name']}}">
							              </a>
							              <a href="{{route('m_getNewsDetail', $side_bar['newest'][$i]['slug'].'-'.$side_bar['newest'][$i]['id'])}}">
							              	<p>{{$side_bar['newest'][$i]['name']}}</p>
							              </a>
							            </div>
					           	<?php } } ?>
					          </div>
					        </div>
					      </div>
					    </section>
						<div class="home_list_article">
							<ul>
								<?php if(!empty($post_newest)) { ?>
									@foreach($post_newest as $p_new)
										<div><li><a href="{{route('m_getNewsDetail', $p_new->slug.'-'.$p_new->id)}}">{{$p_new->name}}</a></li></div>
									@endforeach
								<?php }  ?>
							</ul>
						</div>
					</section>
					<section class="content_tab content_tab_hot" style="display: none">
						<section id="demos">
					      <div class="row">
					        <div class="large-12 ">
					          <div class="loop owl-carousel owl-theme">
								<?php if(count($side_bar['views']) > 0) { ?>
									<?php for ($i=0; $i < count($side_bar['views']); $i++) {  ?>
							            <div class="item" >
							              <a href="{{route('m_getNewsDetail', $side_bar['views'][$i]['slug'].'-'.$side_bar['views'][$i]['id'])}}"><img src="{{asset($side_bar['views'][$i]['images'])}}" alt="{{$side_bar['views'][$i]['name']}}"></a>
							              <a href="{{route('m_getNewsDetail', $side_bar['views'][$i]['slug'].'-'.$side_bar['views'][$i]['id'])}}">
							              	<p>{{$side_bar['views'][$i]['name']}}</p>
							              </a>
							            </div>
					           	<?php } } ?>
					            
					          </div>
					        </div>
					      </div>
					    </section>
						<div class="home_list_article">
							<ul>
								<?php if(!empty($post_hot)) { ?>
									@foreach($post_hot as $p_hot)
										<div><li><a href="{{route('m_getNewsDetail', $p_hot->slug.'-'.$p_hot->id)}}">{{$p_hot->name}}</a></li></div>
									@endforeach
								<?php }  ?>
							</ul>
						</div>
					</section>
				</div>
			</div>
			<div class="area_news_live">
				<div class="list_box_item">
					<?php if(count($post_fulls) > 4){ ?>
						<?php for ($i=4; $i < count($post_fulls); $i++) {  ?>
							<div class="box_item_live">
								<a href="{{route('m_getNewsDetail', $post_fulls[$i]['slug'].'-'.$post_fulls[$i]['id'])}}"><h3>{{$post_fulls[$i]['name']}}</h3></a>
								<div class="media_content">
									<div class="m_left">
										<div class="media"><a href="{{route('m_getNewsDetail', $post_fulls[$i]['slug'].'-'.$post_fulls[$i]['id'])}}"><img src="{{asset($post_fulls[$i]['images'])}}" alt="{{$post_fulls[$i]['name']}}"></a></div>
									</div>
									<div class="content">
										<p>
											{{Illuminate\Support\Str::words($post_fulls[$i]['description'], 22, '...')}}
										</p>
									</div>
									<div class="clear_fix"></div>
								</div>
							</div>
					<?php } } ?>
					<div class="load-more-secction">
					</div>
					<div class="clear_fix"></div>
				</div>
				<input type="hidden" id="number-item" value="12">
				<div  style="color:#F44D27;"><center class="error-newmore"></center></div>
				<div class="news_pagination"><a class="next-page" cid="{{$cid}}" token="{{csrf_token()}}"> Xem thêm <img class="load-img" style="width: 20px;height: 20px;display: none;" src="{{asset('images/load.gif')}}" /></a></div>
			</div>
		</section>
@endsection
