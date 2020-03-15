<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--Bootstrap css-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!--Google-Fonts css-->
        <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2&display=swap" rel="stylesheet">
        <!--Magnific-popup.css-->
        <link rel="stylesheet" href="{{ secure_asset('css/magnific-popup.css') }}">
        <!--Animate.css-->
        <link rel="stylesheet" href="{{ secure_asset('css/animate.css') }}">
        
        <link rel="stylesheet" href="{{ secure_asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/image-gallery.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/slider.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/responsive_gallery.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/footer.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/notes/detail.css') }}">
        <link rel="icon" type="image/png" href="{{ secure_asset('https://storage-hal2.s3-ap-northeast-1.amazonaws.com/photos/new_photos_1.5.jpg') }}">
        
        <title>Free_note</title>
    </head>
    
    <style>
        .top-image {
            background-image: url(https://storage-hal2.s3.ap-northeast-1.amazonaws.com/photos/background-image.0.jpg);
            background-size: cover;
        }
        .main-container {
            width: 100%;
            margin: 0;
            background-image: url(https://storage-hal2.s3.ap-northeast-1.amazonaws.com/photos/background-image2.0.jpg);
            background-size: cover;
        }
    </style>
    
    <body>
        @include("commons.header")
        @yield('content')
        @include("commons.footer")
        
        <!--jQuery JS-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <!--Magnific-popup.js-->
        <script src="{{ secure_asset('js/jquery.magnific-popup.min.js') }}"></script>
        <!--Bootstrap JS-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!--Fontawesome JS-->
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        
        <script src="{{ secure_asset('js/lightbox.js') }}"></script>
        <script src="{{ secure_asset('js/humberger_menu.js') }}"></script>
        <script src="{{ secure_asset('js/tab.js') }}"></script>
        <script src="{{ secure_asset('js/main.js') }}"></script>
        
    </body>
</html>