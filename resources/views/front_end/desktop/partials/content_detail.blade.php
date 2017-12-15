<div class="contai_site_songmoi post_detail_site">
    <div class="w-content">
        <div class="content">
            <div class="primary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ URL::route('getIndexLivingSubtance', isset($cats) ? $cats->slug : null) }}">Sống chất</a></li>
                    <li class="breadcrumb-item active">Trên đường</li>
                </ol>   
                <div class="life-detail-content">
                    <h3 class="name-article">{!! isset($post_detail) ? $post_detail->name : null !!}</h3>
                    <div class="row life-detail-auth">
                        <div class="pull-left">
                        <span class="name-auth">
                            <a href="">{!! isset($author) ? $author->name : null !!}</a>
                        </span>
                            <span class="time-create">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            {!! isset($date_created) ? $date_created : null !!}
                        </span>
                        </div>
                        <div class="pull-right print">
                            <a>
                                <span></span>
                                In bài viết
                            </a>
                        </div>
                    </div>
                    <div class="life-like">
                        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;width=&amp;layout=standard&amp;action=like&amp;size=small&amp;show_faces=false&amp;share=true&amp;height=35&amp;appId=175751532869599"
                                style="border:none;overflow:hidden;margin-bottom: -20px;padding-left: 20px;"
                                scrolling="no" allowtransparency="true" width="100%" height="35"
                                frameborder="0"></iframe>
                    </div>
                    @if(isset($post_cat))
                    <div class="new-same">
                        <ul>
                            @foreach($post_cat as $post_cat_val)
                                <li>
                                    <a href="{{ URL::route('getNewsDetail', $post_cat_val->slug) }}">{!! $post_cat_val->name !!}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="left-content">
                        <h3 class="title-article">{!! isset($post_detail) ? $post_detail->description : null !!}</h3>
                        <p>{!! isset($post_detail) ? $post_detail->content : null !!}</p>
                        
                    </div>
                    <div class="row">
                        <b class="pull-right">Tác giả: {{ $post_detail->author ? $post_detail->author : 'anonymous' }}</b>
                    </div>
                    @if(isset($tag_post))
                        <div class="tag row">
                            <span>Từ Khóa :</span>
                               @foreach($tag_post as $tag_post_val)
                                   <a href="{{ URL::route('getListPostTag', $tag_post_val->slug) }}">{!! $tag_post_val->name !!}</a>
                               @endforeach
                        </div>
                    @endif
                    @if(isset($post_cat))
                    <div class="new-same">
                        <ul>
                            @foreach($post_cat as $post_cat_val)
                                <li>
                                    <a href="{{ URL::route('getNewsDetail', $post_cat_val->slug) }}">{!! $post_cat_val->name !!}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="comment">
                        <div class="fb-comments" data-href="http://songmoi.bluesoft.vn" data-numposts="5"></div>
                    </div>
                </div>
            </div>
            