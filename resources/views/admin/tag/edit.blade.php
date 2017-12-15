@extends('admin')
@section('content_admin')
@include('admin.partials._header')
@include('admin.partials._sidebar')
<div class="rightpanel">
    <ul class="breadcrumbs">
        <li>
            <a href="dashboard.html">
                <i class="iconfa-home">
                </i>
            </a>
            <span class="separator">
            </span>
        </li>
        <li>
            <a href="table-static.html">
                Tables
            </a>
            <span class="separator">
            </span>
        </li>
        <li>
            Table Dynamic
        </li>
        <li class="right">
            <a class="dropdown-toggle" data-toggle="dropdown" href="">
                <i class="icon-tint">
                </i>
                Color Skins
            </a>
            <ul class="dropdown-menu pull-right skin-color">
                <li>
                    <a href="default">
                        Default
                    </a>
                </li>
                <li>
                    <a href="navyblue">
                        Navy Blue
                    </a>
                </li>
                <li>
                    <a href="palegreen">
                        Pale Green
                    </a>
                </li>
                <li>
                    <a href="red">
                        Red
                    </a>
                </li>
                <li>
                    <a href="green">
                        Green
                    </a>
                </li>
                <li>
                    <a href="brown">
                        Brown
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="maincontent">
        <div class="maincontentinner">
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">
                    Form Bordered
                </h4>
                <div class="widgetcontent nopadding">
                    @include('errors.message_error')
                        @include('errors.message_success')
                    <form action="" class="stdform stdform2" method="post" action="{{ url('tag/edit/'.$tag->id) }}">
                        {!! csrf_field() !!}
                        <p>
                            <label for="exampleInputPassword1">
                                Tag
                            </label>
                            <span class="field">
                                <input class="form-control" name="name" placeholder="Nhập tag" type="text" value="{{ $tag->name }}">
                                </input>
                            </span>
                        </p>
                        <p class="stdformbutton">
                            <button class="btn btn-primary">
                                Sửa
                            </button>
                        </p>
                    </form>
                </div>
                <!--widgetcontent-->
            </div>
            <!--widget-->
        </div>
    </div>
    @include('admin.partials._footer')
@endsection
</div>
