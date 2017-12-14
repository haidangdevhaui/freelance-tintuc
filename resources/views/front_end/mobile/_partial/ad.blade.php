@if(isset($ad))
    @if(isset($ad[17]))
        @if($ad[17][0]->type == 1)
        <div class="row ad ad17" target="{{ $ad[17][0]->url }}" timer="{{ $ad[17][0]->timer }}">
            <div class="close-ad">X</div>
            <center>
                <img src="{{ asset($ad[17][0]->images) }}" alt="">
            </center>
        </div>
        @elseif($ad[17][0]->type == 3)
        <object class="row ad ad17">
            <param name="movie" value="{{ asset($ad[17][0]->images) }}">
            <embed src="file.swf" class="ad17">
            </embed>
        </object>
        @elseif($ad[17][0]->type == 2)
        <div class="row ad ad17">
            <div class="close-ad">X</div>
            {!! $ad[17][0]->iframe !!}
        </div>
        @endif
    @endif

    @if(isset($ad[16]))

<style>
/* The Modal (background) */
.modal {
    display: block; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>

        @if($ad[16][0]->type == 1)
        <div class="ad ad16 modal" target="{{ $ad[16][0]->url }}" timer="{{ $ad[16][0]->timer }}">
            <div class="close-ad">X</div>
            <div class="modal-content">
                <center>
                    <img src="{{ asset($ad[16][0]->images) }}" alt="">
                <center>
            </div>
        </div>
        @elseif($ad[16][0]->type == 3)
        <object class="ad ad16 modal">
            <div class="close-ad">X</div>
            <param name="movie" value="{{ asset($ad[16][0]->images) }}">
            <embed src="file.swf" class="ad16">
            </embed>
        </object>
        @elseif($ad[16][0]->type == 2)
        <div class="ad ad16 modal">
            <div class="close-ad">X</div>
            {!! $ad[16][0]->iframe !!}
        </div>
        @endif
<script>
    
</script>
    @endif
    
    @if(isset($ad[18]))
        <div class="hiddenAd18">
            @if($ad[18][0]->type == 1)
            <div class="ad ad18 modal" target="{{ $ad[18][0]->url }}" timer="{{ $ad[18][0]->timer }}">
                <div class="close-ad">X</div>
                <center>
                    <img src="{{ asset($ad[18][0]->images) }}" alt="" style="width: 100%;">
                </center>
            </div>
            @elseif($ad[18][0]->type == 3)
            <object class="ad ad18">
                <div class="close-ad">X</div>
                <param name="movie" value="{{ asset($ad[18][0]->images) }}">
                <embed src="{{ asset($ad[18][0]->images) }}" class="ad18">
                </embed>
            </object>
            @elseif($ad[18][0]->type == 2)
            <div class="ad ad18">
                <div class="close-ad">X</div>
                {!! $ad[18][0]->iframe !!}
            </div>
            @endif
        </div>
    @endif
@endif

