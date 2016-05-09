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
                          <a href="{{ '/'.$type->type.'/'.$row->slug.'/'.$item->slug }}">
                              @if(isset($item->image)&&($item->image))
                                  {{ HTML::image('/upload/image/item/'.$item->image, 'NUMIDAL - '.$item->name) }}
                              @endif
                              <p class="name">{{$item->name}}</p>
                          </a>

                          <div class="description">
                              @if(!empty($item->prop['guests']))
                                <p><i class="glyphicon glyphicon-user"> </i> {{ $item->prop['guests']['text'] }} </p>
                              @endif
                              @if(!empty($item->prop['area']))
                                <p>{{ $item->prop['area']['text'] }}</p>
                              @endif
                              @if(!empty($item->prop['price']))
                                <p class="price"><span>{{ preg_replace("/[^0-9 ]/", '',$item->prop['price']['text']) }}</span> руб/час</p>
                              @endif
                                <p><a class="btn btn-main"  data-toggle="modal" data-item="{{$item->id}}" data-target="#reviewForm">Арендовать</a></p>
                          </div>
                     </div>
                @endforeach
                </div>
            </div>
        @endif

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
