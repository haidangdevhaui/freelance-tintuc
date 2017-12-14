@extends('layouts.mobile')
@section('content')
<style>
    .name{
        /*margin-bottom: 20px;*/
        /*margin-left: 10px;*/
        height: 30px;
        width: 83%;
        border: none !important;
        border-color: #FFF !important;
        padding: 5px;
        padding-left: 50px;
        font-size: 28px;
        color: black;
        /*position: relative;*/
    }
    #btn-search{
        position: absolute;
        top: 2px;
        left: 10px;
        cursor: pointer;
    }
    .loading{
        display: none;
    }
    .result{
        margin-top: 20px;
    }
    .news_pagination{
    	display: none;
    }
</style>
<div class="area_news_live">
	<div class="row" style="position: relative;">
        <center><img class="loading" src="{{asset('images/ellipsis.gif')}}"/></center>
    </div>
    <div class="result-content">
        
    </div>
    <div class="news_pagination">
		<a class="search-load">
			Xem thêm
		</a>
	</div>
</div>

<script>
	
	jQuery(function($){
		var k = '';
		var p = 1;
	    $('#btn-search').click(function(){
	        search(p);
	    });

	    function search(page){
	    	if(k.trim() != $('.name').val().trim()){
				p = 1;
				k = $('.name').val().trim();
	    	}
	        if($('.name').val().trim() == ''){
	            return;
	        }
	        $('.loading').show();
	        $.ajax({
	            url: '{{url("mobile/tim-kiem")}}',
	            type: 'post',
	            data: {
	                _token: '{{csrf_token()}}',
	                q: k,
	                page: page
	            },
	            success: function(res){
	                $('.loading').hide();
	                if(res == 0){
	                	if(page == 1){
							$('.result-content').html('<h4 class="no-result">Không có kết quả cho "'+k+'"</h4>');
	                	}
						return $('.news_pagination').hide();
	                }else{
	                	$(document).find('.no-result').remove();
	                }
	                p ++;
	                $('.result-content').append(res);
	                $('.news_pagination').show();
	            },
	            error: function(){
	                $('.loading').hide();
	                $('.result-content').html('<h4 class="text-center">Lỗi! không thể tìm kiếm bài viết</h4>');
	            }
	        });
	    }
	    search(p);
	    $(document).on('click', '.news_pagination', function(e){
	        search(p);
	    });
	})
</script>
@endsection
