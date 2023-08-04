<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}"> -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/floating-wpp.css') }}" />
</head>

    @include('menu')
    <section class="content"> @yield('content') </section>
  
    <!-- Scripts -->
    @stack('before-scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> --}}
    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery-v3.3.1.min.js') }}"></script>

    @stack('after-scripts')
    @if (trim($__env->yieldContent('page-script')))
        @yield('page-script')
    @endif
</body>

</html>
