@extends('home.layout')

@section('title')
    {{ !empty($row->title)? $row->title:(!empty($type->title)? $type->title:'') }}
@stop

@section('header')
    <link rel="stylesheet" type="text/css" href="/modules/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/modules/slick//slick-theme.css"/>
@stop

@section('content')

    <div id="item-content" class="container-80">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
    {{--            {{ HTML::image('/upload/image/item/'.$row->image, $row->name);  }}--}}

                @if(!empty($row->images[0]))
                    <div id="slick-main">
                        @foreach($row->images as $img)
                            {{ HTML::image('/upload/image/item/'.$row->id.'/'.$img->src, 'img') }}
                        @endforeach
                    </div>
                    @if(count($row->images)>1)
                        <div id="slick-nav">
                            @foreach($row->images as $img)
                                <div class="image" style="background-image: url({{'/upload/image/item/'.$row->id.'/small/'.$img->src}})"></div>
        {{--                        {{ HTML::image('/upload/image/item/'.$row->id.'/small/'.$img->src, 'img') }}--}}
                            @endforeach
                        </div>
                    @endif
                @endif

            </div>
            <div class="col-xs-12 col-sm-6">

                <div class="row">

                    <div class="col-sm-6">

                        <h1>{{ $row->name }}</h1>

                        <? //var_dump('<pre>',$properties)?>

                        @if(!empty($properties['guests']))
                            <p class="guests">{{  $properties['guests']['name'] . ': ' . $properties['guests']['text'] }}</p>
                        @endif

                        @if(!empty($properties['price']))
                            <p class="price">{{  $properties['price']['text'] }}</p>
                        @endif

                        <h3>Характеристики</h3>
                        @if(!empty($properties['length']))
                            <p>{{  $properties['length']['name'] . ': ' . $properties['length']['text'] }}</p>
                        @endif
                        @if(!empty($properties['width']))
                            <p>{{  $properties['width']['name'] . ': ' . $properties['width']['text'] }}</p>
                        @endif
                        @if(!empty($properties['guests']))
                            <p>{{  $properties['guests']['name'] . ': ' . $properties['guests']['text'] }}</p>
                        @endif
                        @if(!empty($properties['speed']))
                            <p>{{  $properties['speed']['name'] . ': ' . $properties['speed']['text'] }}</p>
                        @endif

                        @if(!empty($properties['interior']))
                            <h3>{{ $properties['interior']['name'] }}</h3>
                            <p>{{ $properties['interior']['text'] }}</p>
                        @endif

                    </div>

                    <div class="col-sm-6">
                        <form method="POST" action="/form-request"  role="form" class="contact-form text-center">
                            <h3>Забронировать сейчас</h3>
                            <div>
                                <input type="hidden" name="item" value="{{ $row->id }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="sr-only">Имя</label>
                                <input type="text" name="name" class="form-control" id="inputName" placeholder="Ваше имя" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPhohe" class="sr-only">Телефон</label>
                                <input type="phone" name="phone" class="form-control" id="inputPhohe" placeholder="Ваш телефон" >
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="sr-only">Дата</label>
                                <input type="date" name="email" class="form-control" id="inputEmail" placeholder="Дата">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="sr-only">Количество часов</label>
                                <input type="number" name="email" class="form-control" id="inputEmail" placeholder="Количество часов">
                            </div>
                            <button type="submit" class="btn btn-main">Заказать прокат</button>
                        </form>
                    </div>
                </div>

                <div class="">


                    @if(!empty($properties['description']))
                        <h3>{{ $properties['description']['name'] }}</h3>
                        <p>{{ $properties['description']['text'] }}</p>
                    @endif

                </div>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@stop


@section('scripts')
    <script type="text/javascript" src="/modules/slick/slick.min.js"></script>
    <script>
        $('#slick-main').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '#slick-nav'
        });
        $('#slick-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '#slick-main',
            centerMode: true,
            focusOnSelect: true,
            arrows: true,
            centerPadding: '0',
        });
    </script>

@stop
