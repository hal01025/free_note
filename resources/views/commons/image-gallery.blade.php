<div class="top-image">
    <div class="top-image-container">
        <div class="background-title">
            <img src="" class="black-board">
        </div>
    </div>
    <div class="image-gallery">
        <div class="gallery-title">
            <h2 class="photo-gallery-title"></h2>
        </div>
        <div class="gallery-btn">
            <p><i class="fas fa-arrows-alt-h"></i></p>
        </div>
        <div class="side-menu">
            <ul class="side-menu-list">
                <li class="side-menu-list"><h4 class="side-menu-title">Menu_list</h4></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">tip1(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">tip2(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">tip3(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">tip4(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">tip5(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">tip6(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">tip7(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">機能追加予定</a></li>
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
