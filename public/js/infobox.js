$(document).ready(function() {
    var style = parseInt('{{ $style }}'),
        limit = 4;
    if (style == 1) {
        limit = 3;
    }
    $("#tagDefault").tagit({
        autocomplete: {
            minLength: 2,
            source: '{{url("admin/tag/connect")}}',
            delay: 500,
            select: function(event, ui) {
                var arr = $('#connect').val() == '' ? [] : JSON.parse($('#connect').val());
                var arrValue = ui.item.value.split('-');
                arr.push({
                    name: ui.item.label,
                    id: arrValue[arrValue.length - 1].replace('.html', '')
                });
                $('#connect').val((JSON.stringify(arr)));
                $("#tagDefault").tagit("createTag", ui.item.label);
                return false;
            }
        },
        tagLimit: limit,
        allowSpaces: true,
        singleField: true,
        //singleFieldNode: $("#tagDefault"),
        afterTagRemoved: function(event, ui) {
            var arr = JSON.parse($('#connect').val());
            arr = arr.filter(function(item) {
                return item.name.trim() != ui.tagLabel.trim();
            })
            $('#connect').val((JSON.stringify(arr)));
        },
        onTagLimitExceeded: function() {
            $('#error-tag').html('Kiểu ' + style + ' chỉ được phép thêm tối đa ' + limit + ' bài viết!');
            setTimeout(function() {
                $('#error-tag').html('');
            }, 3000)
        }
    });
    $('.btn-reset-form').click(function() {
        var arr = $('#connect').val() == '' ? [] : JSON.parse($('#connect').val());
        for (var i = 0; i < arr.length; i++) {
            $("#tagDefault").tagit("removeTagByLabel", arr[i].name);
        }
        $('input').not('[name=_token]').val('');
    });
});