<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->

  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
  <script src="{{ asset('js/jquery.min.js') }}" defer></script>
  <script src="{{ asset('js/persian-date.min.js') }}" defer></script>
  <script src="{{ asset('js/persian-datepicker.min.js') }}" defer></script>
  <script src="{{ asset('js/main.min.js') }}" defer></script>

  <!-- Fonts -->
  {{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
  {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/persian-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
  <link rel="shortcut icon" href="{{asset('contract.png')}}" />
</head>