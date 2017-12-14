jQuery(function ($) {
	$('form').on('keyup keypress', function (e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode === 13) {
			e.preventDefault();
			return false;
		}
	});
	var element_li = $('.leftpanel .leftmenu ul li');
	var element_li_class = $('.leftpanel .leftmenu ul li.active');
	if (element_li.hasClass('active')) {
		element_li_class.parent().parent().children('a').addClass('parent_active');
		element_li_class.parents('ul').show();
	}
	var cols_site = $('.cols_site');
	var cols_site_children = cols_site.children();
	var title_img = cols_site.find('h3');

	function img_admin_set_title() {
		var hei_cols = cols_site.height();
		var hei_title_img = title_img.height() / 2;
		title_img.css({
			'margin-top': -hei_title_img
		});
	}
	img_admin_set_title();
	$(window).resize(function () {
		img_admin_set_title();
	});
	cols_site_children.hover(function () {
		$(this).css({
			'opacity': '.7',
			'color': '#ffffff'
		});
		$(this).find('h3').stop().fadeIn();
	}, function () {
		$(this).css({
			'opacity': '1',
			'color': '#ffffff'
		});
		$(this).find('h3').stop().fadeOut();
	});
	$('.list_multiple_images .list_item_images').hover(function () {
		$(this).find('img').css({
			"background-color": "rgba(100,100,100,.9)",
		});
		$(this).find('h3').fadeIn();
	}, function () {
		$(this).find('img').css({
			"background-color": "transparent",
		});
		$(this).find('h3').hide();
	});
	$('.message_error_show').delay('3000').slideUp('2000');
	jQuery('#dyntable').dataTable({
		"sPaginationType": "full_numbers",
		"aaSortingFixed": [
			[0, 'asc']
		],
		"fnDrawCallback": function (oSettings) {
			jQuery.uniform.update();
		}
	});
	jQuery('#dyntable2').dataTable({
		"bScrollInfinite": true,
		"bScrollCollapse": true,
		"sScrollY": "300px"
	});
	jQuery(".js-example-basic-multiple").select2();
	jQuery(".js-example-basic-single").select2();
	/*tag*/
	jQuery("input.tag_news").val();
	// jQuery("#tag_news").tagsinput();

	jQuery('#tag_news').on('beforeItemAdd', function (event) {
		var tag = event.item;
		// Do some processing here

		if (!event.options || !event.options.preventPost) {
			jQuery.ajax('/ajax-url', ajaxData, function (response) {
				if (response.failure) {
					// Remove the tag since there was a failure
					// "preventPost" here will stop this ajax call from running when the tag is removed
					jQuery('#tags-input').tagsinput('remove', tag, {preventPost: true});
				}
			});
		}
	});

	/**/
	var flash = [
		[0, 11],
		[1, 9],
		[2, 12],
		[3, 8],
		[4, 7],
		[5, 3],
		[6, 1]
	];
	var html5 = [
		[0, 5],
		[1, 4],
		[2, 4],
		[3, 1],
		[4, 9],
		[5, 10],
		[6, 13]
	];
	var css3 = [
		[0, 6],
		[1, 1],
		[2, 9],
		[3, 12],
		[4, 10],
		[5, 12],
		[6, 11]
	];

	function showTooltip(x, y, contents) {
		jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css({
			position: 'absolute',
			display: 'none',
			top: y + 5,
			left: x + 5
		}).appendTo("body").fadeIn(200);
	}
	// var plot = jQuery.plot(jQuery("#chartplace"), [{ data: flash, label: "Flash(x)", color: "#6fad04" },
	//     { data: html5, label: "HTML5(x)", color: "#06c" },
	//     { data: css3, label: "CSS3", color: "#666" }
	// ], {
	//     series: {
	//         lines: { show: true, fill: true, fillColor: { colors: [{ opacity: 0.05 }, { opacity: 0.15 }] } },
	//         points: { show: true }
	//     },
	//     legend: { position: 'nw' },
	//     grid: { hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10 },
	//     yaxis: { min: 0, max: 15 }
	// });
	var previousPoint = null;
	jQuery("#chartplace").bind("plothover", function (event, pos, item) {
		jQuery("#x").text(pos.x.toFixed(2));
		jQuery("#y").text(pos.y.toFixed(2));
		if (item) {
			if (previousPoint != item.dataIndex) {
				previousPoint = item.dataIndex;
				jQuery("#tooltip").remove();
				var x = item.datapoint[0].toFixed(2),
						y = item.datapoint[1].toFixed(2);
				showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
			}
		} else {
			jQuery("#tooltip").remove();
			previousPoint = null;
		}
	});
	jQuery("#chartplace").bind("plotclick", function (event, pos, item) {
		if (item) {
			jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
			plot.highlight(item.series, item.datapoint);
		}
	});
	//datepicker
	// jQuery('#created_at-datepicker').datepicker();
	// tabbed widget
	jQuery('.tabbedwidget').tabs();
});

function confirmDelete(msg) {
	if (window.confirm(msg)) {
		return true;
	} else {
		return false;
	}
}
jQuery(document).ready(function () {
//    jQuery('#created_at-datepicker').datetimepicker({
//        format: 'yyyy-mm-dd hh:mm:ss'
//    });

	jQuery("#created_at-datepicker").datepicker({
		dateFormat: "yy-mm-dd h:i:s",
		defaultDate: 0,
		minDate: '0d'
	});
	
	// var _b = 0;
	$('.btn-add-connect').click(function(){
		_b ++;
        var box = '<div class="row box-connect fix-css-connect">';
        box += '<input class="form-control" type="text" name="connect['+_b+'][name]" placeholder="Nhập tên liên kết..." required="">';
        box += '<input class="form-control" type="text" name="connect['+_b+'][link]" placeholder="Nhập link liên kết..." required="">';
        box += '<button class="btn btn-danger btn-remove-connect" type="button">xóa</button></div>';
        $(box).insertBefore($(this));
    });

    $('body').on('click', '.btn-remove-connect', function(){
        $(this).parent().remove();
    })
});