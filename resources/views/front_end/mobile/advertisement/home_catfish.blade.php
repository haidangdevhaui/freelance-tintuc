@if(isset($home_catfish_advert))
    @foreach($home_catfish_advert as $home_catfish_advert_val)
		<div class="home_catfish">
			<div class="page_home_catfish">
			    <div class="off_advert_catfish">
			        <div class="fa_icon">
			    	    <i class="fa fa-times" aria-hidden="true"></i>
			        </div>
			    </div>
				<div class="img">
					<img style="background-image: url({{ url('Uploads/advertisement/'. $home_catfish_advert_val->images) }})" class="bg_item_res" src="{{ url('assets/images/item_catfish.png') }}" alt="">
				</div>
			</div>
		</div>
	@endforeach
@endif