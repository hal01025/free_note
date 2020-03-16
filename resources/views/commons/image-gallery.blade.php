<div class="top-image">
    <div class="top-image-container">
        <div class="background-title">
            <h1 class=""></h1>
        </div>
    </div>
    <div class="image-gallery">
        <div class="gallery-title">
            <h2 class="photo-gallery-title">Photo Gallery</h2>
        </div>
        <div class="gallery-btn">
            <p><i class="fas fa-arrows-alt-h"></i></p>
        </div>
        <div class="side-menu">
            <ul class="side-menu-list">
                <li class="side-menu-list"><h4 class="side-menu-title">Menu_list</h4></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">item1(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">item2(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">item3(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">item4(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">item5(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">item6(未実装)</a></li>
                <li class="side-menu-item"><a href="" class="side-menu-link">item7(未実装)</a></li>
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
                <div class="photo-container">
                    <img src="{{ secure_asset('https://storage-hal2.s3-ap-northeast-1.amazonaws.com/photos/blank-792125_1920.jpg') }}" class="photo-image">
                    <p class="photo-title">No image</p>
                </div>
                <div class="photo-container">
                    <div class="photo-image black-image"></div>
                </div>
                <div class="photo-container">
                    <div class="photo-image black-image"></div>
                </div>
                <div class="photo-container">
                    <div class="photo-image black-image"></div>
                </div>
                <div class="photo-container">
                    <div class="photo-image black-image"></div>
                </div>
            @endif
        </div>
    </div>
</div>
