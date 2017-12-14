@if(isset($home_top_advert))
@foreach($home_top_advert as $home_top_advert_val)
<div class="home-top-wrapper wrapper_site">
	<div class="home-top">
	    @if(!empty($home_top_advert_val->images))
		   <img class="item_img_size" src="{{ url('Uploads/advertisement/'.$home_top_advert_val->images) }}" alt="">
		@else
		   <img class="item_img_size" src="{{ url('assets/images/no-image.jpg') }}" alt="">
		@endif
	</div>
</div>
@endforeach
@endif