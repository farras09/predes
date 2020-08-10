<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nova | Bootstrap app landing</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'IDBlog') }} - IDStack Sample Blog Project Admin</title>
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="{{ asset('assets/blog/vendor/bootstrap/css/bootstrap.min.css') }}">

  <!-- Owl Carousel-->
  <link rel="stylesheet" href=" {{ asset('assets/blog/vendor/owl.carousel2/assets/owl.carousel.css') }} ">
  <link rel="stylesheet" href=" {{ asset('assets/blog/vendor/owl.carousel2/assets/owl.theme.default.css') }} ">
  <!-- Modal Video-->
  <link rel="stylesheet" href="  {{ asset('assets/blog/vendor/modal-video/css/modal-video.min.css') }} ">
  <!-- Google fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,800&amp;display=swap">
  <!-- Device Mockup-->
  <link rel="stylesheet" href=" {{ asset('assets/blog/css/device-mockups.css') }} ">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href=" {{ asset('assets/blog/css/style.default.css') }} " id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href=" {{ asset('assets/blog/css/custom.css') }} ">
  <!-- Favicon-->
  <link rel="shortcut icon" href="{{ asset('assets/blog/img/favicon.png') }}">

  <style>
    .form-control:not(select) {
      padding: 1.5rem 0.5rem;
    }

    select.form-control {
      height: 52px;
      padding-left: 0.5rem;
    }

    .form-control::placeholder {
      color: #ccc;
      font-weight: bold;
      font-size: 0.9rem;
    }

    .form-control:focus {
      box-shadow: none;
    }
  </style>

  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script><![endif]-->
</head>

<body>
  <header class="header">
    <!-- Main Navbar-->
    @include('layouts.blog.partials._navbar')
  </header>

  @yield('content')

  <!-- Page Footer-->
  <footer class="main-footer">
    @include('layouts.blog.partials._footer')
  </footer>

  <!-- JavaScript files-->
  <script src="{{ asset('assets/blog/vendor/jquery/jquery.min.js') }} "></script>
  <script src="  {{ asset('assets/blog/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src=" {{ asset('assets/blog/vendor/owl.carousel2/owl.carousel.min.js') }}"></script>
  <script src=" {{ asset('assets/blog/vendor/modal-video/js/modal-video.js') }}"></script>
  <script src="{{ asset('assets/blog/js/front.js') }}"></script>
  <script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite - 
    //   see more here 
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

      var ajax = new XMLHttpRequest();
      ajax.open("GET", path, true);
      ajax.send();
      ajax.onload = function(e) {
        var div = document.createElement("div");
        div.className = 'd-none';
        div.innerHTML = ajax.responseText;
        document.body.insertBefore(div, document.body.childNodes[0]);
      }
    }
    // this is set to BootstrapTemple website as you cannot 
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

    // For Demo Purpose [Changing input group text on focus]
    $(function() {
      $('input, select').on('focus', function() {
        $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
      });
      $('input, select').on('blur', function() {
        $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
      });
    });
  </script>
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


</body>

</html>