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
                <p class="text-center">Путешествие или работа, необходимость добираться до места встречи с комфортом   или желание сделать необычный подарок -  это прекрасный повод обратиться в  Компанию «Numidal», которая предоставляет свои услуги под различные бизнес-задачи, будь то яхта на экономический форум или организация чартерных рейсов по России и за её пределами:</p>
                <div class="row items">
                    @if(!empty($categories))
                        <?php $k=0; ?>
                        @foreach($categories as $k=>$cat)
                            <div class="col-xs-6 col-sm-4 col-lg-2">
                                <a href="/rent/{{$cat->slug}}" class="cat-item">
                                    <div class="img">
                                        {{HTML::image('/upload/image/'.$cat->image, $cat->name)}}
                                    </div>
                                    <p>{{$cat->preview}}</p>
                                </a>
                            </div>
                            <?php
                               $k++;
                               if(($k%2)==0) {echo('<div class="clearfix visible-xs-block"></div>'); }
                               if(($k%3)==0) {echo('<div class="clearfix visible-sm-block visible-md-block"></div>'); }
                            ?>
                        @endforeach
                    @endif
                </div>

                @if(!empty($popular))
                    <h2>Самое популярное</h2>
                    <div class="items" id="items">
                        <div class="row">
                            @foreach($popular as $item)
                                <div class="col-xs-12 col-sm-3 item">
                                    @if(isset($item->image)&&($item->image))
                                        {{ HTML::image('/upload/image/item/'.$item->image, 'img') }}
                                    @endif
                                    <div class="description">
                                        <p class="name">{{$item->name}}</p>
                                        {{--<p>Команда: 3 человека</p>--}}
                                        <p><i class="glyphicon glyphicon-user"></i> 60 человек</p>
                                        <p>Неограниченный район плавания</p>
                                        {{--<p>Скорость хода: 15-17 узлов</p>--}}
                                        <p class="price"><span>1500</span> руб/час</p>
                                        <p><a class="btn btn-main">Арендовать</a></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
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
        <h2>Фотографии из жизни компании </h2>
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
                <p class="text-right"><a href="#" class="link">Перейти в галерею</a></p>
            </div>
        </div>
        <div id="description" >
            <div class="container-80">
                <div class="row">
                    <h2>Наши клиенты </h2>
                    <p>&nbsp;</p>
                    <div class="col-xs-12 col-sm-6">
                        <p>
                           Нашими услугами пользуется руководящий состав Газпрома и Роснефти, арендуя яхту на время экономического форума в Петербурге.
                            Также среди наших клиентов множество знаменитостей, имена которых знает каждый: Вагит Аликперов, Олег Дерипаска,
                            Группа «Scorpions», Группа «Metallica», 
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <p>
                             Принцесса Бутана — Сонам Дечен, Вангчук, Дмитрий Хворостовский, Сергей Адоньев,
                            Валерий Сюткин, Тимур Родригез, Группа «Звери», Репер L’One, Группа «Марсель», Певица Анна Седокова, Певица «Глюкоза»,
                            Певица Анита Цой и многие другие.
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
        <div id="description" >
            <div class="container-80">
                <div class="row">
                    <h2>Цена аренды </h2>
                    <p>&nbsp;</p>
                    <div class="col-xs-12 col-sm-6">
                        <p>
                            Если Вам нужна яхта, теплоход, катер или вертолет напрокат, цены Вас приятно удивят. Предлагая комфорт и высокий сервис,
                            мы не завышаем стоимость своих услуг. Вы можете убедиться в этом самостоятельно, изучив прайс на нашем сайте.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <p>
                            Вы можете взять в аренду яхту, катер или теплоход вместе с персоналом, который сделает Ваше путешествие незабываемым и беззаботным.
                            Прокат вертолета или заказ чартерного рейса из Санкт-Петербурга еще никогда не были так доступны.
                            Мы можем отправить транспорт к Вам, или предоставить его в нашем клубе.
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

        $('.navbar-nav > li:first-child').addClass('active');

        });

      </script>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

@stop
