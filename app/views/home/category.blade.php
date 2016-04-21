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
        @if(!empty($row))
            <div class="container-80">
                <? //var_dump($row->items) ?>
                <div id="items" class="row">
                @foreach($row->items as $item)
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
        {{--<div class="container-80">--}}
            {{--<div id="items" class="row">--}}
               {{--@for($i=0; $i<8; $i++)--}}

               {{--<div class="col-xs-12 col-sm-3 item">--}}
                   {{--<img src="/images/princess421.png" alt="">--}}
                   {{--<div class="description">--}}
                       {{--<p class="name">Lady Ola</p>--}}
                       {{--<p>Команда: 3 человека</p>--}}
                       {{--<p><i class="glyphicon glyphicon-user"></i> 60 человек</p>--}}
                       {{--<p>Неограниченный район плавания</p>--}}
                       {{--<p>Скорость хода: 15-17 узлов</p>--}}
                       {{--<p class="price"><span>1500</span> руб/час</p>--}}
                       {{--<p class="text-center"><a class="btn btn-main">Арендовать</a></p>--}}
                   {{--</div>--}}
               {{--</div>--}}

               {{--@endfor--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="text-block">
            <div class="container-80">
                <div class="row">
                    @if(!empty($row->text))
                        {{$row->text}}
                    @elseif(!empty($type->text))
                        {{$type->text}}
                    @endif
                </div>
            </div>
        </div>


@stop


@section('scripts')

@stop
