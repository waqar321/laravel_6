<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ URL('css/frontend_css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL('css/frontend_css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL('css/frontend_css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ URL('css/frontend_css/price-range.css') }}" rel="stylesheet">
    <link href="{{ URL('css/frontend_css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL('css/frontend_css/main.css') }}" rel="stylesheet">
    <link href="{{ URL('css/frontend_css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL('images/frontend_images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL('images/frontend_images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL('images/frontend_images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ URL('images/frontend_images/ico/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->

<body>
    
    @include('layouts.frontLayout.front_header')

    @include('layouts.frontLayout.front_sidebar')

    @yield('content')

    @include('layouts.frontLayout.front_footer')
    
   <!-- ===============Version: 1.10.2===================== -->
    <!-- <script src="{{ URL('js/frontend_js/jquery.js') }}"></script> -->
    <script>
        // var $x = jQuery.noConflict();
        // alert("Version: "+$x.fn.jquery);
    </script>

   <!-- ===============Version: 1.9.1===================== -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <script>
       // var $y = jQuery.noConflict();
       // alert("Version: "+$y.fn.jquery);
    </script>
   <!-- ===============Version: 2.1.3===================== -->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
       // var $y = jQuery.noConflict();
       // alert("Version: "+$y.fn.jquery);
    </script>
</head>

    <script src="{{ URL('js/frontend_js/bootstrap.min.js') }}"></script>
    <script src="{{ URL('js/frontend_js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ URL('js/frontend_js/price-range.js') }}"></script>
    <script src="{{ URL('js/frontend_js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ URL('js/frontend_js/jquery.validate.js') }}"></script>
    <script src="{{ URL('js/frontend_js/main.js') }}"></script>
    <script type="text/javascript">
        
        $(document).ready(function(){
             // alert('mainjs');
        });
        


    </script>
</body>
</html>