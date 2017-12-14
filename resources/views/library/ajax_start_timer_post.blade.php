<script>
jQuery(function($) {
    $('.start_action_timer_post').click(function() {
        var post_id = $(this).parent().attr('class');
        var timer_post = $(this).parent().parent().children('.timer_post_list').attr('name');
        var timer_explode = timer_post.split(' ');
        var timer_explode_one = timer_explode[0].split('-');
        var timer_explode_two = timer_explode[1].split(':');
        var timer_sum_format = parseInt(timer_explode_one[0])*86400 + parseInt(timer_explode_one[1])*2629743.83 + parseInt(timer_explode_one[2])*31556926 + parseInt(timer_explode_two[0])*3600 + parseInt(timer_explode_two[1])*60 + parseInt(timer_explode_two[2]);

        var time_current = new Date();
        var get_day = time_current.getDate();
        var get_month = time_current.getMonth()+1;
        var get_year = time_current.getFullYear();
        var get_hours = time_current.getHours();
        var get_min = time_current.getMinutes();
        var get_second = time_current.getSeconds();
        var timer_sum_current = get_day*86400 + get_month*2629743.83  + get_year*31556926 + get_hours*3600 + get_min*60 + get_second;
        var timer_set_sum = parseInt(timer_sum_format - timer_sum_current);
        var duration_timer = timer_set_sum*1000;
        function post_action_ajax_timer() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route("startTimerPost") }}',
                data: {
                    'confirm': 'yes',
                    'post_id': post_id,
                },
                type: 'GET',
                success: function(responses) {
                    console.log(responses);
                }
            });
        }
        alert('bạn hẹn giờ thành công ');
        setTimeout(function() {
          post_action_ajax_timer();
        }, duration_timer);
    });
});
</script>
