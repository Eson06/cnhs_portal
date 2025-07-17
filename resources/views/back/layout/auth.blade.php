<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> @yield('pageTitle') | CBNH PORTAL</title>
    <link rel="icon" href="{{asset('images/logo.png')}}" />
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
</head>

<body class="d-flex flex-column position-relative" style="background: none;">
    <style>
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('{{ asset('images/cnhs_bg.jpg') }}') no-repeat center center;
            background-size: cover;
            filter: blur(8px);
            z-index: -1;
        }
    </style>
    <!-- Your page content here -->
</body>


    <div class="page page-center">
        @yield('content')

    </div>
  </body>
</html>
