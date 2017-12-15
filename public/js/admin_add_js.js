jQuery(function($){
	$('.name_add_cat').keyup(function(){
	    var name_add_cat = $(this).val().toString().slug();
        $('.add_slug_cat').attr('value', name_add_cat);
	});
});

String.prototype.slug = function(){
	str = this.valueOf().toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
    str = str.replace(/-+-/g, "-");
    str = str.replace(/^\-+|\-+$/g, "");
    str = str.replace(/–/g, "");
    return str;
}

var cfDt = {
    // "sDom": "<'row'r>t<'row pull-right'p>>",
    "processing": true,
    "sPaginationType": "full_numbers",
    "iDisplayLength": 25,
    "bLengthChange": true,
    "bFilter": false,
    "bInfo": false,
    "bSort": false,
    "oLanguage": {
        "oPaginate": {
            "sFirst": 'Đầu',
            "sLast": 'Cuối',
            "sNext": 'Sau',
            "sPrevious": 'Trước'
        },
        "sLengthMenu": "_MENU_ bản ghi",
        "sProcessing": '<center><img src="'+baseURL_editor+'/images/ellipsis.gif"/></center>',
        "sEmptyTable": '<center>Không tìm thấy dữ liệu</center>',
        "sSearch": "Lọc các từ _INPUT_ trong bảng",
        "sInfo": "Có tất cả _TOTAL_ sản phẩm, đang hiển thị từ _START_ đến _END_",
        "sInfoEmpty": "Không có dữ liệu để hiển thị"
    }
}
