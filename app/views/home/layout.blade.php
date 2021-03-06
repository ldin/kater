<!DOCTYPE html>
<html lang="ru">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     @if(!empty($row->description))
         <meta name="Description" content="{{$row->description}}">
     @endif
     @if(!empty($row->keywords))
         <meta name="Keywords" content="{{$row->keywords}}">
     @endif

    <title>@yield('title')</title>

    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <![endif]-->

    @yield('header')

     <link href="/css/main.css?05" rel="stylesheet">
 </head>

<body>
    <div class="wappers">
        <header id="header">
            <article class="head js-header-block" data-type="background" data-speed="10">
                <div class="container-80">
                    <div class="row">
                        <div class="col-xs-12 col-md-7">
                            <a id="mainLogo"  href="/">
                                <img src="/images/logo.png" alt="Numidal">
                                <span class="title">Аренда судов в Санкт-Петербурге</span>
                            </a>
                        </div>
                        <div class="text-right col-xs-12 col-md-5 txt-block">
                            <div class="address">
                                <p>{{(!empty($settings['address'])?$settings['address']:'').', '.(!empty($settings['name'])?$settings['name']:'')}}</p>
                                <p>
                                    <a href="tel:{{!empty($settings['phone'])?preg_replace('/[^0-9]/', '', $settings['phone']):''}}" class="tel">
                                        <span itemprop="telephone"> {{ !empty($settings['phone'])?$settings['phone']:'' }}</span>
                                    </a>
                                </p>
                            </div>
                            <a href="" class="btn btn-main" data-toggle="modal" data-target="#reviewForm">Забронировать судно</a>
                        </div>
                    </div>
                </div>

            </article>
            <div id="menu" class="relative">
                <nav class="navbar">
                    <div class="container-80">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                            <ul class="nav navbar-nav">
                                @if(isset($type_page))
                                    @foreach($type_page as$type=>$page)
                                        <li {{ (Request::is($type.'*')) ? 'class="active"' : '' }}>{{HTML::link($type, $page)}}</li>
                                    @endforeach
                                @endif
                            </ul>

                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container -->
                </nav>
            </div>
        </header>
        @yield('slider')
        <main>
            @yield('content')
        </main>
    </div>
    <footer>
        @section('footerMap')
            <div id="footerMap">
                {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1996.8848467969697!2d30.2433702707007!3d59.96723360466857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469636c024405819%3A0x33572844a1731c18!2z0K_RhdGCINC60LvRg9CxICLQmtGA0LXRgdGC0L7QstGB0LrQuNC5Ig!5e0!3m2!1sru!2sru!4v1460200155830" width="100%" height="420" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
                {{--<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=SLLPxyPGVQ5OzL0vjZn6TfTJYpzUEvqF&width=100%&height=420&lang=ru_RU&sourceType=constructor"></script>--}}
            </div>
        @show
        <div class="container">
            <div class="row text-center">

                <div class="col-xs-12">
                    <a id="footerLogo"  href="/"></a>
                </div>
                <div class="col-xs-12">
                    <p>{{(!empty($settings['footer-address'])?$settings['footer-address']:'')}}</p>
                    <p>{{(!empty($settings['name'])?$settings['name']:'')}}</p>
                    <p>
                        <a href="tel:{{!empty($settings['phone'])?preg_replace('/[^0-9]/', '', $settings['phone']):''}}">
                            <span itemprop="telephone"> {{ !empty($settings['phone'])?$settings['phone']:'' }}</span>
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </footer>

    @include('home.popup')

{{ HTML::script('/js/lib/jquery-1.11.3.min.js') }}
{{ HTML::script('/js/lib/bootstrap.min.js') }}
{{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>--}}


{{ HTML::script('/js/main.min.js') }}
@yield('scripts')




</body>

</html>
