<div class="top-image">
    <div class="top-image-container"></div>
    <div class="image-gallery">
        @if(!count($photos))
            <div class="gallery-title">
                <h2>Let's Create New Note!</h2>
                <p>your photos will be placed here</p>
            </div>
        @else
        @endif
        <div class="gallery-btn">
            <p><i class="fas fa-arrows-alt-h"></i></p>
        </div>
        <div class="side-menu">
            <ul class="side-menu-list">
                <li class="side-menu-list"><h3 class="side-menu-header">More_About...</h3></li>
                <li class="side-menu-list"><h4 class="side-menu-title">・Portfolio</h4></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">my_portfolio(未実装)</a></li>
                <li class="side-menu-list"><h4 class="side-menu-title">・LP_Reproduction</h4></li>
                <li class="side-menu-item"><a href="" class="side-menu-link" target="_blank">page1(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link" target="_blank">page2(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link" target="_blank">page3(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link" target="_blank">page4(未実装)</a></li>
                <li class="side-menu-list"><h4 class="side-menu-title">・App_List</h4></li>
                <li class="side-menu-item"><a href="{{ secure_asset('http://meet-one-hal.herokuapp.com/') }}" class="side-menu-link" target="_blank">MEET-ONE.</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link" target="_blank">application2(未実装)</a></li>
                <li class="side-menu-item"><a href="{{ secure_asset('http://microposts-hal.herokuapp.com/') }}" class="side-menu-link" target="_blank">Microposts (スクール課題)</a></li>
            </ul>
        </div>
        <div class="image-gallery-container animated fadeInUp">
            @if($photos)    
                @foreach($photos as $num=>$photo)    
                    <div class="photo-container">
                        <a class="popup" href="{{ secure_asset($photo) }}"><img src="{{ secure_asset($photo) }}" class="photo-image"></a>
                    </div>
                @endforeach
            @else

            @endif
        </div>
    </div>
</div>
