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

        <!-- Add fancyBox -->
    <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />


@stop

@section('slider')

<div id="slide1" class="main-slides">
    <div class="container-80">
        <p class="title">
            Легкая и непринужденная атмосфера,<br>
            интересные маршруты<br> и отдых от шумного города
        </p>
        <p><a href="#">Аренда парусников</a></p>
    </div>
</div>    

@stop

@section('content')
    <div id="landing-page">
        <div id="rent">
            <div class="container-80">
                <h2>Вы можете взять в аренду</h2>
                <p>Путешествие или работа, необходимость добираться до места встречи с комфортом   или желание сделать необычный подарок -  это прекрасный повод обратиться в  Компанию «Numidal», которая предоставляет свои услуги под различные бизнес-задачи, будь то яхта на экономический форум или организация чартерных рейсов по России и за её пределами:</p>
                <div class="row">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="col-xs-2 active">
                            <a href="#launch" aria-controls="launch" role="tab" data-toggle="tab">
                                <div class="img">
                                    <img src="/images/ico/cat-ico-4.png">
                                </div>
                                <p>Катер для экскурсий и деловых поездок</p>
                            </a>
                        </li>
                        <li role="presentation" class="col-xs-2">
                            <a href="#ships" aria-controls="ships" role="tab" data-toggle="tab">
                                <div class="img">
                                    <img src="/images/ico/cat-ico-4.png">
                                </div>
                                <p>Теплоход для прогулки по рекам и каналам Петербурга</p>
                            </a>
                        </li>
                        <li role="presentation" class="col-xs-2">
                            <a href="#sailboats" aria-controls="sailboats" role="tab" data-toggle="tab">
                                <div class="img">
                                    <img src="/images/ico/cat-ico-4.png">
                                </div>
                                <p>Парусник в Петербурге для впечатляющего отдыха</p>
                            </a>
                        </li>
                        <li role="presentation" class="col-xs-2">
                            <a href="#yacht" aria-controls="yacht" role="tab" data-toggle="tab">
                                <div class="img">
                                    <img src="/images/ico/cat-ico-4.png">
                                </div>
                                <p>Катер для экскурсий и деловых поездок</p>
                            </a>
                        </li>
                        <li role="presentation" class="col-xs-2">
                            <a href="#helicopter" aria-controls="helicopter" role="tab" data-toggle="tab">
                                <div class="img">
                                    <img src="/images/ico/cat-ico-4.png">
                                </div>
                                <p>Вертолет для бизнеса, экскурсий и охоты</p>
                            </a>
                        </li>
                        <li role="presentation" class="col-xs-2">
                            <a href="#aircraft" aria-controls="aircraft" role="tab" data-toggle="tab">
                                <div class="img">
                                    <img src="/images/ico/cat-ico-4.png">
                                </div>
                                <p>Самолет для путешествий по России и миру</p>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="launch">
                            <div id="items" class="row">
                                <div class="col-xs-6 col-sm-3 item">
                                    <img src="/images/princess421.png" alt="">
                                    <div class="description">
                                        <p class="name">Crownline</p>
                                        <p><i class="glyphicon glyphicon-user"></i> 60 человек</p>
                                        <p>Неограниченный район плавания</p>
                                        <p class="price"><span>1500</span> руб/час</p>
                                        <p><a class="btn btn-main">Арендовать</a></p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 item">
                                    <img src="/images/princess421.png" alt="">
                                    <div class="description">
                                        <p class="name">Название45</p>
                                        <p><i class="glyphicon glyphicon-user"></i> 60 человек</p>
                                        <p>Неограниченный район плавания</p>
                                        <p class="price"><span>1500</span> руб/час</p>
                                        <p><a class="btn btn-main">Арендовать</a></p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 item">
                                    <img src="/images/princess421.png" alt="">
                                    <div class="description">
                                        <p class="name">Объект</p>
                                        <p><i class="glyphicon glyphicon-user"></i> 60 человек</p>
                                        <p>Неограниченный район плавания</p>
                                        <p class="price"><span>1500</span> руб/час</p>
                                        <p><a class="btn btn-main">Арендовать</a></p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 item">
                                    <img src="/images/princess421.png" alt="">
                                    <div class="description">
                                        <p class="name">Title45</p>
                                        <p><i class="glyphicon glyphicon-user"></i> 60 человек</p>
                                        <p>Неограниченный район плавания</p>
                                        <p class="price"><span>1500</span> руб/час</p>
                                        <p><a class="btn btn-main">Арендовать</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="ships">
                            <div id="items" class="row">
                                <div class="col-xs-6 col-sm-3 item">
                                    <img src="/images/princess421.png" alt="">
                                    <div class="description">
                                        <p class="name">Объект</p>
                                        <p><i class="glyphicon glyphicon-user"></i> 60 человек</p>
                                        <p>Неограниченный район плавания</p>
                                        <p class="price"><span>1500</span> руб/час</p>
                                        <p><a class="btn btn-main">Арендовать</a></p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 item">
                                    <img src="/images/princess421.png" alt="">
                                    <div class="description">
                                        <p class="name">Title45</p>
                                        <p><i class="glyphicon glyphicon-user"></i> 60 человек</p>
                                        <p>Неограниченный район плавания</p>
                                        <p class="price"><span>1500</span> руб/час</p>
                                        <p><a class="btn btn-main">Арендовать</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="sailboats">...</div>
                        <div role="tabpanel" class="tab-pane fade" id="yacht">...</div>
                        <div role="tabpanel" class="tab-pane fade" id="launch">...</div>
                        <div role="tabpanel" class="tab-pane fade" id="launch">...</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="slide2" class="main-slides">
            <div class="container-80">
                <p class="title">Великолепные панорамы,<br> как с обложки журнала</p>
                <p><a href="#">Аренда яхт</a></p>
            </div>
        </div>
        <div id="additionally">
            <div class="container-80">
                <h2>Доп. услуги, которые мы оказываем:</h2>
                <div class="img-block text-center row">
                    <div class="col-xs-6 col-sm-1-5">
                        <img src="/images/ico/add-ico-1.png">
                        <p>Оформление судов</p>
                    </div>
                    <div class="col-xs-6 col-sm-1-5">
                        <img src="/images/ico/add-ico-2.png">
                        <p>Таможенные и страховые услуги</p>
                    </div>
                    <div class="col-xs-6 col-sm-1-5">
                        <img src="/images/ico/add-ico-3.png">
                        <p>Тех. обслуживание и хранение техники</p>
                    </div>
                    <div class="col-xs-6 col-sm-1-5">
                        <img src="/images/ico/add-ico-4.png">
                        <p>Организация чартерных рейсов</p>
                    </div>
                    <div class="col-xs-6 col-sm-1-5">
                        <img src="/images/ico/add-ico-5.png">
                        <p>Доверительное управление судном</p>
                    </div>
                </div>
                <div class="txt-block text-center">
                    <p>
                        В Вашем распоряжении воздушный и водный транспорт <b>Премиум Класса</b>. Мы на личном опыте доказали, что аренда яхты,
                        катера или вертолета может быть доступной и не дорогой. У нас есть всё для деловых поездок и экскурсий для тех,
                        кто ценит свое время и комфорт. Наша компания  оказывает услуги бизнес-авиации,
                        современные суда помогут Вам очутиться в любом аэропорту мира в кротчайшие сроки.
                        <b>Гордость нашей компании -  самолет Chellenger 850.</b>
                    </p>
                </div>
            </div>
        </div>
        <div id="gallery" >
            <div class="container-80">
                <div class="row">
                    @if(!empty($gallery))
                        @foreach($gallery as $image)
                            <div class="item col-xs-4 col-sm-2">
                                <a class="fancybox" rel="gallery" href="{{ $image->image }}" title="{{ $image->text }}" style="background-image: url({{$image->small_image}})"></a>
                            </div>
                        @endforeach
                    @endif
                </div>
                <p><a href="#">Перейти в галерею</a></p>
            </div>
        </div>
        <div id="description" >
            <div class="container-80">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <h3>Цена аренды </h3>
                        <p>
                            Если Вам нужна яхта, теплоход, катер или вертолет напрокат, цены Вас приятно удивят. Предлагая комфорт и высокий сервис,
                            мы не завышаем стоимость своих услуг. Вы можете убедиться в этом самостоятельно, изучив прайс на нашем сайте.
                        </p>
                        <p>
                            Вы можете взять в аренду яхту, катер или теплоход вместе с персоналом, который сделает Ваше путешествие незабываемым и беззаботным.
                            Прокат вертолета или заказ чартерного рейса из Санкт-Петербурга еще никогда не были так доступны.
                            Мы можем отправить транспорт к Вам, или предоставить его в нашем клубе.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <h3>Наши клиенты</h3>
                        <p>
                            Нашими услугами пользуется руководящий состав Газпрома и Роснефти, арендуя яхту на время экономического форума в Петербурге.
                            Также среди наших клиентов множество знаменитостей, имена которых знает каждый: Вагит Аликперов, Олег Дерипаска,
                            Группа «Scorpions», Группа «Metallica», Принцесса Бутана — Сонам Дечен, Вангчук, Дмитрий Хворостовский, Сергей Адоньев,
                            Валерий Сюткин, Тимур Родригез, Группа «Звери», Репер L’One, Группа «Марсель», Певица Анна Седокова, Певица «Глюкоза»,
                            Певица Анита Цой и многие другие.
                        </p>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p class="text-italic">
                            Обращаясь в компанию «Numidal», Вы экономите свое время и путешествуете с комфортом.
                            Возьмите в аренду водный или воздушный транспорт сейчас, и мы гарантируем Вам высокий сервис, которого Вы достойны.
                            Спешите,  транспорт необходимо бронировать заранее.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="slide3" class="main-slides">
            <div class="container-80">
                <p class="title">Прогулочные экскурсии,<br> организация мероприятий</p>
                <p><a href="#">Посмотреть маршруты</a></p>
            </div>
        </div>
    </div>
@stop

@section('scripts')


    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

      <script type="text/javascript">

        $(document).ready(function() {
          $(".fancybox").fancybox({
              prevEffect  : 'none',
              nextEffect  : 'none',
              padding:0,
              helpers : {
                title : {
                  type: 'outside'
                },
                thumbs  : {
                  width : 50,
                  height  : 50
                },
                overlay: {
                   locked: false
                }
              }
          });
        });

      </script>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

@stop
