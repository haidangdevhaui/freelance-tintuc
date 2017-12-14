@if(isset($advert_mobile_all_catfish))
	<div class="home_catfish">
		<div class="page_home_catfish">
			<div class="img">
				<img style="background-image: url({{ url('Uploads/advertisement/'. $advert_mobile_all_catfish->images) }})" class="bg_item_res" src="{{ url('assets/images/item_catfish.png') }}" alt="">
			</div>
		</div>
	</div>
@endif

