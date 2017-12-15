@extends('layouts.desktop')

@section('content')
<div class="w-content">
    <div class="content">
        <div class="error">
            <img src="{{ asset('images/404.jpg') }}"/>
            <h3>Trang bạn tìm kiếm không tồn tại.</h3>
            <p>Có thể URL bị hỏng hoặc đã bị quản trị viên xóa bỏ.</p>
            <a href="{{ url('/') }}">Quay về trang chủ</a>
        </div>
    </div>
</div>
@endsection