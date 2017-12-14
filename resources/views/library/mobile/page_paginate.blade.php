<script>
jQuery.noConflict();

jQuery(function($) { 
	var record_per_page = 4;
	var page = 1;
	var stopped = false;
	var is_busy = false;
	var html = '';
	var paginate_load_item = $('.paginate_load_item');
	var item_paginate_length = $('paginate_load_item > box_item_live').length;
    $('#paginate_load').click(function() {
        var button = $(this);
        button.html('Đang tải ...');
        page++;
        var data = {
        	ok: 'ok',
        	record_per_page: record_per_page,
        	page: page,
        	id: '{{ $id }}'
        }
        $.ajax({
            type: 'get',
            url: "{{ route('getPaginateLoadMb') }}",
            data: data,
            success: function(res){
            	if(res.length != '') {
            		button.html('Xem thêm');
                    var etc = item_paginate_length;
                    for(ect=0;ect<res.length;ect++) {
                        var slug_item = res[ect].slug; 
                        var item_link = "{{ url('mobile/news-detail/') }}/"+slug_item; 
                        var image_item = '{{ url("Uploads/News/") }}/'+ res[ect].images; console.log(image_item);
                    	html += '<div class="box_item_live">';
		                    html += '<a href=""><h3>'+res[ect].name+'</h3></a>';
		                    html += '<div class="media_content">';
		                        html += '<div class="m_left">';
		                            html += '<div class="media">';
	                                    html += '<a href="'+ item_link +'" style="background-image:url('+ image_item +')">';
	                                      html += '<img src="{{ url("assets/mobile/img2/item2.png") }}" alt="">';
	                                    html += '</a>';
		                            html += '</div>';
		                        html += '</div>';
		                        html += '<div class="content">';
		                            html += '<p>'+res[ect].description+'</p>';
		                        html += '</div>';
		                        html += '<div class="clear_fix"></div>';
		                    html += '</div>';
		                html += '</div>';
                    }
	                paginate_load_item.append(html);
	                html = '';
            	}else {
            		button.html('Hết bài viết');
            	}
            }
        })
    });
});
</script>
