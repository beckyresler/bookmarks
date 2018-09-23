<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title'){!! config('site.meta_title_divider') !!}{{ config('site.website_title') }}</title>
<link href="https://fonts.googleapis.com/css?family=Federo|Lato:400,700" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
</head>
<body{!! (isset($bodyClass)) ? ' class="'.$bodyClass.'"' : '' !!}>
@yield('content')
</body>
</html>