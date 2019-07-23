<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="/css/app.css" rel="stylesheet" type="text/css">
        {{--<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">--}}
    </head>
    <body>
        @if(Session::has('Flash_messege'))
            <dive class="myalert">{{Session::get('Flash_messege')}}</dive>
        @endif
        @yield('content')
        {{--<script src="/js/jquery.min.js"></script>--}}
        <script>
            $(".myalert").delay(3000).slideToggle(3000);
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.js"></script>

    </body>
</html>