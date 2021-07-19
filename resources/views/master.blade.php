<!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-free-5.15.3-web/css/fontawesome.min.css')}}">
    @stack('styles')
</head>
<body>
    <div class="d-flex flex-column sticky-footer-wrapper min-vh-100">
        <nav>
            @include('shared.navbar')
        </nav>
        <main class="flex-fill">
            <div class="container-fluid">
                <div class="row">
                    @include('shared.sidebar-left')

                    <div style="min-height: 980px;" class="col-md-8 py-3 ">
                        @yield('content')
                    </div>

                    @include('shared.sidebar-right')
                </div>
            </div>
        </main>
        <footer>
            @include('shared.footer')
        </footer>
    </div>

{{--    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>--}}
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    @stack('scripts')
</body>
</html>

