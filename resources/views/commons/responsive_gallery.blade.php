<div class="responsive-container">
    <div class="container responsive-gallery">
        <h2 class="photo-gallery-title">Photo_Gallery</h2>
        @foreach($photos as $photo)
            <div class="photo-container responsive-photo-container">
                <a class="popup" href="{{ secure_asset($photo) }}"><img src="{{ secure_asset($photo) }}" class="photo-image"></a>
            </div>
        @endforeach
    </div>
</div>