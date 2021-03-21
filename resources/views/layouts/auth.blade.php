<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title . ' | ' . config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body{
            background: #ffffff !important
        }
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 200px;
            background-color: rgb(104, 102, 102);
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            top: -5px;
            left: 105%
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
        }
        .helper:after{
            content: ' \003F';
        }
        .helper{
            background: rgb(66, 66, 66);
            color: white;
            border-radius: 50%;
            height: 14px;
            width: 14px;
            text-align: center;
            line-height: 14px;
            font-size: 12px;
        }
    </style>
</head>
<body class="">
    <main id="blog-area" class="lg:p-12 p-5 lg:pb-12 pb-16">
        <div class=" lg:my-12 my-10 flex items-center justify-center">
            <img src="{{ asset('/images/logo.svg') }}" alt="logo" class="">
        </div>
        <div class="container mx-auto">
            <div class="pt-8 lg:flex">
                <div class="lg:w-5/12 mx-auto">
                    <h1 class="md:text-3xl text-xl font-bold md:mb-20 mb-10 text-center">{{ $title }}</h1>

                    @yield('content')
                </div>
            </div>
    
        </div>
    </main>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('custom-scripts')
</body>
</html>