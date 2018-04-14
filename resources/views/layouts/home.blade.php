<!Doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index/follow"/>
    <meta name="DC.title" content="CloudOfe"/>
    <meta name="description" content="Welcome to your profile on CloudOfe, create, upload and share files and folders.">
    <meta name="keywords" content="Cloud. CloudOfe, file sharing, folder sharing, upload files, file hosting, access files from anywhere"/>
    <meta itemprop="name" content="CloudOfe">
    <meta itemprop="description" content="Welcome to your profile on CloudOfe, create, upload and share files and folders.">
    <meta property="og:image" content=""/>
    <meta name="og:title" content="CloudOfe">
    <meta name="og:description" content="VWelcome to your profile on CloudOfe, create, upload and share files and folders.">
    <meta name="og:url" content="{{env('APP_URL')}}">
    <meta name="og:site_name" content="CloudOfe">
    <meta name="og:locale" content="en_US">
    <meta name="og:type" content="website">
    <title>CloudOfe</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="{{mix('css/all.css')}}">
    <link type="icon/png" href="/images/brand/logo_icon.png" rel="icon">
</head>
<body>
<div id="app">
    <main>
        @yield('content')
    </main>
</div>
<script src="{{mix('/js/app.js')}}"></script>
</body>
</html>
