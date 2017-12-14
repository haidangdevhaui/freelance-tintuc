@if(isset($advert_mobile_front_end_all_top))
<div class="home-top-wrapper wrapper_site">
	<div class="home-top">
	    @if(!empty($advert_mobile_front_end_all_top->images))
		   <img class="item_img_size" src="{{ url('Uploads/advertisement/'.$advert_mobile_front_end_all_top->images) }}" alt="">
		@else
		   <img class="item_img_size" src="{{ url('assets/images/no-image.jpg') }}" alt="">
		@endif
	</div>
</div>
@endif
