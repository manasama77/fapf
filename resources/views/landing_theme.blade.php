<!DOCTYPE html>
<html class="no-js">

<head>
    <title>Career at FAP AGRI - FAP AGRI Career</title>
    @include('partials.landing.meta')
    @include('partials.landing.style')

    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
</head>

<body>
    <!-- Google Tag Manager (noscript) -->

    <!-- End Google Tag Manager (noscript) -->

    <header class="c-header c-header--gocareer c-header--gocareer__white">
        <div class="container">
            @include('partials.landing.navbar')
        </div>
        <div class="c-header--gocareer__hamburger c-header--gocareer__hamburger--white u-hide--desktop js-side-menu"
            data-target="js-content-side-munu"></div>
        <div class="c-header--gocareer__side-menu c-header--gocareer__side-menu--white u-hide--desktop"
            id="js-content-side-munu">
            @include('partials.landing.navbar_mobile')
        </div>
    </header>

    @yield('aku_isi_mas')

    @include('partials.landing.footer')

    <script src="{{ asset('js/DyUVfnQzjmf5.js') }}"></script>
    <script src="{{ asset('js/EfyJtMJ15CLx.js') }}"></script>
    <script src="{{ asset('js/hwtS4kIXeeP4.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
