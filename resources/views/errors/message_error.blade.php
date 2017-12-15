@if(count($errors) > 0)
    <div class="col-md-12">
        <div class="alert alert-danger message_error_show">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
