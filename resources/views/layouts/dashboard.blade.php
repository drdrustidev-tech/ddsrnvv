<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mycustom.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('node_modules/jquery-ui/jquery-ui.min.css')}}">Styles -->
    

</head>
<body>

@include(' layouts.includes.page_head')

@include(' layouts.includes.top_nav')
  
<div class="container-fluid mt-2"> <!-- START MIDDLE MAIN -->
   <div class="row">
     <div class="col-md-2">
     @include(' layouts.includes.left_sidebar')
     </div>     
     <div class="col-md-8">
        @yield('content')

     </div>
     <div class="col-md-2">
     @include(' layouts.includes.right_sidebar')
     </div>
</div>
</div> <!-- END MIDDLE MAIN -->

<!-- Footer -->
@include(' layouts.includes.footer')
<!-- end of footer -->   
@yield('script')
</body>
</html>
