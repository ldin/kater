@extends('home.layout')

@section('title')
    {{ !empty($row->title)? $row->title:(!empty($type->title)? $type->title:'') }}
@stop

@section('content')

        @if(isset($posts)&&count($posts)>0)
            <div id="page-block-menu">
                <div class="container-80">
                    <ul class="menu-page">
                        @foreach($posts as $post)
                            <li {{ (Request::is( $type->type.'/'.$post->slug)) || (!empty($row)&&$row->parent==$post->id)? 'class="active"' : '' }} >
                                <a href="/{{$type->type.'/'.$post->slug}}">
                                <div class="img">
                                    {{ HTML::image('upload/image/'.$post->image, $post->name) }}
                                </div>
                                <p class="txt">{{ $post->name }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="container-80">
            <div id="items" class="row">
               @for($i=0; $i<8; $i++)

               <div class="col-xs-12 col-sm-3 item">
                   <img src="/images/princess421.png" alt="">
                   <div class="description">
                       <p class="name">Lady Ola</p>
                       <p>Команда: 3 человека</p>
                       <p>Количество пассажиров: 60 человек</p>
                       <p>Неограниченный район плавания</p>
                       <p>Скорость хода: 15-17 узлов</p>
                       <p class="price"><span>1500</span> руб/час</p>
                       <p class="text-center"><a class="btn btn-main">Арендовать</a></p>
                   </div>
               </div>

               @endfor
            </div>
        </div>

        <div class="row text-block">
            <div class="container-80">
                <div class="col-xs-12 col-sm-6">
                    <h3>Почему становится популярным прокат катеров?</h3>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>
                        Рост спроса на услугу довольно просто объяснить. Многие хотят сделать оригинальный подарок близким, или же оформить свое мероприятие так, чтобы оно запомнилось на долгие годы. Эксклюзивность услуг и премиум формат поможет сделать праздник действительно волшебным. Прокат катеров в компании Numidal предполагает, что путь путешествия вы можете выбрать сами, или же наши сотрудники предоставят вам план маршрута по самым красочным местам Петербурга.
                    </p>
                    <p>
                        Если вам нужна арена катеров, цены можно просмотреть на нашем сайте. Лучше всего взять катер напрокат вместе с персоналом, который сделает ваш отдых более приятным и заставит забыть обо всех проблемах.
                    </p>
                    <p>
                        Если вы ищите самый простой и интересный способ удивить близких и устроить нечто незабываемое, то аренда катера в СПб – как раз то, что вам необходимо.
                    </p>
                </div>
            </div>
        </div>


@stop


@section('scripts')

@stop
