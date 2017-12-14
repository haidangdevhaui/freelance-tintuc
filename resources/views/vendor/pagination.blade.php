@if($data->count())
<ul class="pagination">
    @if(PaginateRoute::hasPreviousPage())
    <li class="disabled">
        <a href="{{ PaginateRoute::previousPageUrl() }}">«</a>
    </li>
    @else
    <li class="disabled">
        <span>
            «
        </span>
    </li>
    @endif
    @for ($i = 1; $i <= $data->lastPage(); $i++)
        @if($i > $data->currentPage() - 4)
            <li class="{{ ($data->currentPage() == $i) ? ' active' : '' }}">
                <a href="{{ PaginateRoute::pageUrl($i) }}">{{ $i }}</a>
            </li>
        @endif
        @if($i > $data->currentPage() + 3)
        <li class="disabled">
            <span>
                ...
            </span>
        </li>
        @break
        @endif
    @endfor
    <li>
        <a href="{{ PaginateRoute::pageUrl($data->lastPage()) }}">
            Trang Cuối
        </a>
    </li>
    @if(PaginateRoute::hasNextPage($data))
        <li>
            <a href="{{ PaginateRoute::nextPageUrl($data) }}" rel="next">
                »
            </a>
        </li>
    @else
        <li class="disabled">
            <span>
                »
            </span>
        </li>
    @endif
    
</ul>
@endif