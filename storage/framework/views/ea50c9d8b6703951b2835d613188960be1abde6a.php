<?php $__env->startSection('content'); ?>
    <style>
        .result-content{
            /*min-height: 500px;*/
        }
        .name{
            margin-bottom: 20px;
            margin-left: 10px;
            height: 50px;
            width: 1000px;
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
            top: 5px;
            left: 10px;
            cursor: pointer;
        }
        .loading{
            display: none;
        }
        .result{
            margin-top: 20px;
        }
    </style>
    <div class="w-content">
        <div class="content">
            <div class="primary">
                <center><img class="loading" src="<?php echo e(asset('images/ellipsis.gif')); ?>"/></center>
                <div class="page-live">
                    <!-- <div class="row" style="position: relative;">
                        <input type="text" class="form-control name" placeholder="nhập từ tìm kiếm...">
                            <img src="<?php echo e(asset('images/icon-search.png')); ?>" alt="" width="40" height="40" id="btn-search">
                        </input>
                        
                    </div> -->
                    <div class="result-content">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#btn-search').click(function(){
            search(1);
        });

        function search(page){
            if($('.search-name').val().trim() == ''){
                return;
            }
            $('.loading').show();
            $.ajax({
                url: '<?php echo e(url("tim-kiem")); ?>',
                type: 'post',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    q: $('.search-name').val(),
                    page: page
                },
                success: function(res){
                    $('.loading').hide();
                    $('.result-content').html(res);
                    $(document).scrollTop(0);
                },
                error: function(){
                    $('.loading').hide();
                    $('.result-content').html('<h4 class="text-center">Lỗi! không thể tìm kiếm bài viết</h4>');
                    $(document).scrollTop(0);
                }
            });
        }
        search(1);

        $(document).on('click', '.phantrang ul li', function(e){
            e.preventDefault();
            
            var page = $(this).find('a').html();
            page = parseInt(page);
            if(page != NaN){
                $(this).addClass('active');
                search(page);
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.desktop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>