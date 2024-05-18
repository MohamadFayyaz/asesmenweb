<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Point Of Sales</title>
    <link rel="stylesheet" href="{{ url('/bootstrap') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/fontawesome') }}/css/fontawesome.css">
    <link rel="stylesheet" href="{{ url('/fontawesome') }}/css/all.css">
    <script src="{{ url('/webfont') }}/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <style>
        body {
            font-family: 'Lato';
            background-color: #e9ebec;
        }

        @media print {
            body {
                visibility: hidden;
            }

            #section-to-print {
                display: block !important;
                visibility: visible;
                position: absolute;
                z-index: 2;
                width: 100%;
                left: 0;
                top: 0;
                bottom: 0;
                right: 0;
            }
        }
    </style>
</head>

<body>


    @if (session()->has('msg_status'))
        <div class="alert alert-{{ session('msg_status') }}" role="alert">
            {!! session('msg') !!}
        </div>
    @endif
    @yield('content')

    @yield('script')
    <script src="{{ url('/bootstrap') }}/js/bootstrap.min.js"></script>
</body>

</html>
