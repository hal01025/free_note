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
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/slider.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/footer.css">
        <title>Free_note</title>
    </head>
    
    <body>
        @include("commons.header")
        @include("commons.slider")
        @include("commons.error_messages")
        @yield('content')
        @include("commons.footer")
        
        <!--jQuery JS-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <!--Bootstrap JS-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!--Fontawesome JS-->
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        
        <script src="js/slider.js"></script>
        
    </body>
</html>