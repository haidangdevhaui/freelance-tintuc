@if(isset($advert_mobile_all_pop_up))
	<div class="home_pop_up">
		<div class="home_page_pop_up">
		    <div class="button_off_popup">
		    	<i class="fa fa-times" aria-hidden="true"></i>
		    </div>
			<div class="img">
				<img style="background-image: url({{ url('Uploads/advertisement/'. $advert_mobile_all_pop_up->images) }})" class="bg_item_res" src="{{ url('assets/mobile/img2/item2.png') }}" alt="">
			</div>
		</div>
	</div>
@endif