@if(isset($cat_children))
<div class="menu-drop menu_desktop">
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="active"><a href="{{ URL::route('getIndexLivingSubtance', isset($post_id_current) ? $post_id_current : null) }}">Tất cả</a></li>
            @foreach($cat_children as $cat_val_child)
                <li><a class="@if(isset($cats) && $cats->id == $cat_val_child->id) {{ 'active_brown' }} @endif" href="{{ URL::route('getNewLife', $cat_val_child->slug) }}">{!! $cat_val_child->name !!}</a></li>
            @endforeach
        </ul>
    </nav>
</div>
@endif
