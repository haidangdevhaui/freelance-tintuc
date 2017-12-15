<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>@yield('title_admin')</title>
<link rel="stylesheet" href="{{ url('css/style.default.css') }}" type="text/css" />

<link rel="stylesheet" href="{{ url('css/admin/responsive-tables.css') }}">
<link href="{{ url('css/admin/fileinput.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ url('css/admin/select2.min.css') }}">
<link href="{{ url('css/admin/daterangepicker.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ url('css/admin/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ url('css/admin/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ url('css/admin/switchery.min.css') }}">

<link rel="stylesheet" href="{{asset('css/pagination.css')}}">
<style type="text/css">
	body{
		overflow-y: scroll;
	}
</style>


<link href="{{ url('css/admin/hanoienglishtest.css') }}" rel="stylesheet">
<link href="{{ url('css/admin/backEnd.css') }}" rel="stylesheet">
<script src="{{ url('js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ url('js/moment.js') }}"></script>
<script src="{{ url('js/jquery-ui.min.js') }}"></script>
<script src="{{ url('js/modernizr.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/moment-with-locales.min.js') }}"></script>
<script src="{{ url('js/jquery.uniform.js') }}"></script>
<script src="{{ url('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('js/jquery.flot.js') }}"></script>
<script src="{{ url('js/jquery.flot.resize.js') }}"></script>
<script src="{{ url('js/responsive-tables.js') }}"></script>
<script src="{{ url('js/custom.js') }}"></script>
<script src="{{ url('js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ url('plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('js/fileinput.min.js') }}"></script>
<script>
	var $ = jQuery;
    var baseURL_editor = "{!! url('/') !!}";
</script>

<script src="{{ url('plugins/func_ckfinder.js') }}"></script>
<script src="{{ url('js/select2.min.js') }}"></script>
<script src="{{ url('js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ url('js/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{url('js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{ url('js/option_admin.js') }}"></script>
<script src="{{ url('js/admin_add_js.js') }}"></script>
</head>

<body>
	@yield('content_admin')
	<script>
		var elems = document.querySelectorAll('.js-switch');
		for (var i = 0; i < elems.length; i++) {
		  var switchery = new Switchery(elems[i]);
		}
	</script>
</body>
</html>
