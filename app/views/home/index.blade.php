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

<div id="slider">
    <p class="title">
        Легкая и непринужденная атмосфера,<br>
        интересные маршруты и отдых от шумного города
    </p>
    <p><a href="#">Аренда парусников</a></p>
</div>    

@stop

@section('content')
<div id="rent">
    <div class="container-80">
        <h2>Вы можете взять в аренду</h2>
        <p></p>
    @ include()
</div>
<div id="" >
    <div class="container-80">
        <h3>Великолепные панорамы,<br> как с обложки журнала</h2>
        <p><a href="#">Аренда яхт</a></p>
    </div>
</div>
<div id="">
    <div class="container-80">
        <h2>Доп. услуги, которые мы оказываем:</h2>
        <div class="block">
            <div class="col-xs-6 col-sm-1-5">
                <img src="/images/ico/xxx.png">
                <p>Оформление судов</p>
            </div>
            <div class="col-xs-6 col-sm-1-5">
                <img src="/images/ico/xxx.png">
                <p>Таможенные и страховые услуги</p>
            </div>
            <div class="col-xs-6 col-sm-1-5">
                <img src="/images/ico/xxx.png">
                <p>Тех. обслуживание и хранение техники</p>
            </div>
            <div class="col-xs-6 col-sm-1-5">
                <img src="/images/ico/xxx.png">
                <p>Организация чартерных рейсов</p>
            </div>
            <div class="col-xs-6 col-sm-1-5">
                <img src="/images/ico/xxx.png">
                <p>Доверительное управление судном</p>
            </div>
        </div>
        <div class="text-block">
            <p>
                В Вашем распоряжении воздушный и водный транспорт Премиум Класса. Мы на личном опыте доказали, что аренда яхты, 
                катера или вертолета может быть доступной и не дорогой. У нас есть всё для деловых поездок и экскурсий для тех, 
                кто ценит свое время и комфорт. Наша компания  оказывает услуги бизнес-авиации, 
                современные суда помогут Вам очутиться в любом аэропорту мира в кротчайшие сроки. 
                Гордость нашей компании -  самолет Chellenger 850.
            </p>
        </div>
    </div>    
</div>
<div id="gallery" >
    <div class="container-80">
        <div class="block"></div>
        <p><a href="#">Перейти в галерею</a></p>
    </div>
</div>
<div id="description" >
    <div class="container-80">
        <div class="col-xs-12 col-sm-6">
            <h3>Цена аренды </h3>
            <p>
                Если Вам нужна яхта, теплоход, катер или вертолет напрокат, цены Вас приятно удивят. Предлагая комфорт и высокий сервис, 
                мы не завышаем стоимость своих услуг. Вы можете убедиться в этом самостоятельно, изучив прайс на нашем сайте.
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
<div id="" >
    <div class="container-80">
        <h3>Прогулочные экскурсии,<br> организация мероприятий</h2>
        <p><a href="#">Посмотреть маршруты</a></p>
    </div>
</div>
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
