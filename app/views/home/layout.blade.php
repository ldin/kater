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

     <link href="/css/main.css?03" rel="stylesheet">
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
                            <a href="" class="btn btn-main">Забронировать судно</a>
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

        <main>
            @yield('content')
        </main>
    </div>
    <footer>
        <div id="footerMap">
            <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=SLLPxyPGVQ5OzL0vjZn6TfTJYpzUEvqF&width=100%&height=420&lang=ru_RU&sourceType=constructor"></script>
        </div>
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

{{ HTML::script('/js/lib/jquery-1.11.3.min.js') }}
{{ HTML::script('/js/lib/bootstrap.min.js') }}

{{ HTML::script('/js/main.min.js') }}
@yield('scripts')




</body>

</html>
