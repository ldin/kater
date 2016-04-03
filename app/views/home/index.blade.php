@extends('home.layout')

@section('title') {{ !empty($settings['title'])?$settings['title']:'' }} @stop

@section('header')
    <meta property="og:type" content="profile"/>
    <meta property="profile:first_name" content=""/>
    <meta property="profile:last_name" content=""/>
    {{--<meta property="og:description" content=""/>--}}
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>

@stop

@section('slider')


@stop

@section('content')


@stop

@section('scripts')
    <link href="/css/animation-main.css?01" rel="stylesheet">

    <!-- Файлы CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
    <link rel="stylesheet" href="/module/assets/countdown/jquery.countdown.css" />

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- JavaScript -->
    <script src="/module/assets/countdown/jquery.countdown.js"></script>
    <script src="/module/assets/js/script.js"></script>
@stop
