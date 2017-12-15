@extends('admin')
@section('content_admin')
    @include('admin.partials._header')
    @include('admin.partials._sidebar')

    @if(isset($ad))
        @if($ad->type == 1)
        <?php $viewer = '<img src="'.asset($ad->images).'" style="width:160px"/>' ?>
        @elseif($ad->type == 3)
        <?php $viewer = '<embed src="'.asset($ad->images).'" style="width:160px"></embed>' ?>
        @endif
    @else
    <?php $viewer = '<img src="'.asset('images/No_image_available.svg').'" style="width:160px"/>' ?>
    @endif
    <!-- page content -->
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Quảng cáo</a> <span class="separator"></span></li>
                <li>{{ isset($ad) ? 'Cập nhật' : 'Thêm' }} quảng cáo</li>
            
            <li class="right">
                <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-tint"></i> Color Skins</a>
                <ul class="dropdown-menu pull-right skin-color">
                    <li><a href="default">Default</a></li>
                    <li><a href="navyblue">Navy Blue</a></li>
                    <li><a href="palegreen">Pale Green</a></li>
                    <li><a href="red">Red</a></li>
                    <li><a href="green">Green</a></li>
                    <li><a href="brown">Brown</a></li>
                </ul>
            </li>
        </ul>
        
        <div class="pageheader">
            <form action="results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                <h5>Quảng cáo</h5>
                <h1>{{ isset($ad) ? 'Cập nhật' : 'Thêm' }} quảng cáo</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="widgetbox box-inverse">
                    <h4 class="widgettitle">Form Bordered</h4>
                    <div class="widgetcontent nopadding">
                        @include('errors.message_error')
                        @include('errors.message_success')
                        <form class="stdform stdform2" method="post" action="{{ url('admin/add-advertisement') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @if(isset($ad))
                            <input type="hidden" name="id" value="{{ $ad->id }}"/>
                            @endif
                            <p>
                                <label for="exampleInputEmail1">Tên quảng cáo : </label>
                                <span class="field">
                                    <input type="text" class="form-control name_add_cat input-xxlarge" id="exampleInputEmail1"
                               placeholder="Nhập tên quảng cáo " name="name" value="{!! old('name', isset($ad) ? $ad->name : '') !!}">
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputEmail1">Quảng cáo chạy trên: </label>
                                <span class="field">
                                    <select name="screen" id="screen" class="form-control" onchange="selectScreen(this.value)">
                                        <option value="0" @if(isset($ad)) {{ $ad->screen == 0 ? 'selected=""' : ''}} @endif>Desktop</option>
                                        <option value="1" @if(isset($ad)) {{ $ad->screen == 1 ? 'selected=""' : ''}} @endif>Mobile</option>
                                    </select>
                                </span>
                            </p>
                            
                            <p>
                                <label for="exampleInputPassword1">Đường dẫn thân thiện</label>
                                <span class="field">
                                    <input type="slug" class="form-control add_slug_cat input-xxlarge" id="exampleInputPassword1" placeholder="Nhập slug"
                               name="slug" value="{!! old('slug', isset($ad) ? $ad->slug : '') !!}">
                                </span>
                            </p>
                            
                            <p>
                                <label for="exampleInputPassword1">Url</label>
                                <span class="field">
                                    <input type="url" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập url"
                               name="url" value="{!! old('url', isset($ad) ? $ad->url : '') !!}">
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputEmail1">Loại nội dung: </label>
                                <span class="field">
                                    <select name="type" id="type" class="form-control" onchange="selectType(this.value)">
                                        <option value="1" @if(isset($ad)) {{ $ad->type == 1 ? 'selected=""' : ''}} @endif>Ảnh</option>
                                        <option value="2" @if(isset($ad)) {{ $ad->type == 2 ? 'selected=""' : ''}} @endif>Iframe</option>
                                        <option value="3" @if(isset($ad)) {{ $ad->type == 3 ? 'selected=""' : ''}} @endif>Flash SWF</option>
                                    </select>
                                </span>
                            </p>

                            <p id="field-img">
                                <label for="exampleInputPassword1">File </label>
                                <div class="field img-select">
                                    <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
                                    <div class="text-center" action="/avatar_upload.php" method="post"
                                         enctype="multipart/form-data">
                                        <div class="kv-avatar center-block" style="width:200px;margin-left:0;">
                                            <input id="file-ad" name="images" type="file" class="file-loading"
                                            @if(!isset($ad))
                                                required=""
                                            @endif
                                            >
                                        </div>
                                    </div>
                                </div>
                            </p>

                            <p id="field-iframe" style="display: none">
                                <label for="exampleInputPassword1">Iframe</label>
                                <span class="field">
                                    <textarea name="iframe" class="form-control" style="width: 70%;">{{ old('iframe') }}</textarea>
                                </span>
                            </p>

                            <p id="field-category">
                                <label for="exampleInputPassword1">Hiển thị ở</label>
                                <div class="field">
                                    <div class="form-group category_parent_add_news">
                                        <select name="category_id" id="select-category" onchange="selectCategory(this.value)">
                                            <option value="">---Chọn chuyên mục---</option>
                                            <option value="0" @if(isset($ad)) {{ $ad->home == 1 ? 'selected=""' : ''}} @endif>Trang chủ</option>
                                            <option value="-1" @if(isset($ad)) {{ $ad->post == 1 ? 'selected=""' : ''}} @endif>Chi tiết bài viết</option>
                                            @if(isset($cate_news))
                                                <?php cate_parent($cate_news, 0, "", old('category_id', isset($ad) ? $ad->category_id : '')); ?>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </p>

                            <p id="field-timer" style="display: none;">
                                <label for="exampleInputPassword1">Thời gian (giây)</label>
                                <span class="field">
                                    <input type="number" class="form-control input-large" placeholder="Tự đóng sau"
                               name="close" value="{!! old('timer') !!}"><br/><br/>
                                    <input type="number" class="form-control input-large" placeholder="Tự xuất hiện sau" name="open">
                                </span>
                            </p>

                            
                            <p>
                                <label for="exampleInputPassword1">Vị trí quảng cáo</label>
                                <div class="field">
                                    <div class="form-group">
                                        <select name="position" id="select-position" onchange="selectPosition(this.value)">
                                            <option value="">---Chọn vị trí---</option>
                                            @if(isset($position))
                                                @foreach($position as $ps)
                                                    <option value="{{ $ps['value'] }}" {{ @$ad->position == $ps['value'] ? 'selected' : ''}}>{{ $ps['name'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Kích hoạt </label>
                                <span class="field">
                                    <input class="js-switch" type="checkbox" {{@$ad->status == 1 ? 'checked' : ''}} name="checkbox"> Active
                                </span>
                            </p>
                            
                            <p class="stdformbutton">
                                <button class="btn btn-primary">
                                    {{ isset($ad) ? 'Cập nhật' : 'Thêm' }}
                                </button>
                            </p>
                        </form>
                    </div><!--widgetcontent-->
                </div><!--widget-->
    @include('admin.partials._footer')
@endsection
<!-- <script src="{{asset('js/jquery-2.1.4.min.js')}}"></script> -->
<script type="text/javascript">
    jQuery(function ($) {
        'use strict';
        var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' +
                'onclick="alert(\'Call your custom code here.\')">' +
                '<i class="glyphicon glyphicon-tag">Thẻ</i>' +
                '</button>';
        $("#file-ad").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open">Mở </i>',
            removeIcon: '<i class="glyphicon glyphicon-remove">Xoá</i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '{!! $viewer !!}',
            layoutTemplates: {main2: '{preview} ' + btnCust + ' {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });

    });
</script>
<script>
    var home = JSON.parse('{{ json_encode(config("adv.home")) }}'.replace(/&quot;/g, '"'));
    var category = JSON.parse('{{ json_encode(config("adv.category")) }}'.replace(/&quot;/g, '"'));
    var subCategory = JSON.parse('{{ json_encode(config("adv.sub_category")) }}'.replace(/&quot;/g, '"'));
    var detail = JSON.parse('{{ json_encode(config("adv.detail")) }}'.replace(/&quot;/g, '"'));
    var mobileDetail = JSON.parse('{{ json_encode(config("adv.mobile_detail")) }}'.replace(/&quot;/g, '"'));

    function loadSelect(obj){
        var option = '';
        for(var i = 0; i < obj.length; i ++){
            option += '<option value="'+ obj[i].value +'">'+ obj[i].name +'</option>';
        }
        $('#select-position').html(option);
        //console.log(option);
        //document.getElementById("select-position").innerHTML = option;
    }

    

    function selectCategory(category_id){
        var v = category_id;
        var txt = $('#select-category option:selected').html();
        if(v == ''){
            loadSelect([{value: '', name: '---Chọn vị trí---'}]);
        }else
        if(v == 0){
            loadSelect(home);
        }else
        if(v == -1){
            loadSelect(detail);
        }else
        if(!txt.indexOf('--') && $('#select-category option:selected').val() != ""){
            loadSelect(subCategory);
        }else{
            loadSelect(category);
        }
    }

    function selectType(type){
        switch (parseInt(type)){
            case 1:
                $('#field-iframe').hide();
                $('#field-img, .img-select').show();
                $('#file-ad').fileinput('refresh', {allowedFileExtensions: ["jpg", "png", "gif"]});
                $('#file-ad').attr('required', '');
                break;
            case 2:
                $('#field-img, .img-select').hide();
                $('#field-iframe').show();
                $('#file-ad').removeAttr('required');
                break;
            case 3:
                $('#field-iframe').hide();
                $('#field-img, .img-select').show();
                $('#file-ad').fileinput('refresh', {allowedFileExtensions: ["swf"]});
                $('#file-ad').attr('required', '');
                break;
        }
    }

    function selectScreen(screen){
        if(screen == 1){
            loadSelect(mobileDetail);
            $('#select-category').val(-1);
            $('#select-category option').not('[value=-1]').hide();
        }else{
            $('#select-category option').not('[value=-1]').show();
            $('#select-category').val('');
            loadSelect([]);
        }
    }

    

    function selectPosition(select){
        switch(parseInt(select)){
            case 16:
                $('#file-ad').fileinput('refresh', {maxFileSize: 100, maxImageWidth: 640, maxImageHeight: 1280});
                $('#field-timer').hide();
                $('#field-timer').find('input').attr('disabled', '');
                break;
            case 17:
                $('#file-ad').fileinput('refresh', {maxFileSize: 60, maxImageWidth: 300, maxImageHeight: 50});
                $('#field-timer').find('input').removeAttr('disabled');
                $('#field-timer').show();
                break;
            case 18:
                $('#file-ad').fileinput('refresh', {maxFileSize: 100, maxImageWidth: 300, maxImageHeight: 250});
                $('#field-timer').hide();
                $('#field-timer').find('input').attr('disabled', '');
                break;
            default:
                $('#file-ad').fileinput('refresh', {maxFileSize: 1024, maxImageWidth: 1280, maxImageHeight: 720});
                $('#field-timer').hide();
                $('#field-timer').find('input').attr('disabled', '');
                break;
        }
    }

    if('{{ @$ad }}'){
        selectCategory('{{ @$ad->category_id }}');
        selectType('{{ @$ad->type }}');
        selectScreen('{{ @$ad->screen }}');
        selectPosition('{{ @$ad->position }}');
    }
    
</script>