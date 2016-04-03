@extends('home.layout')

@section('title')
    {{ !empty($row->title)? $row->title:(!empty($type->title)? $type->title:'Asafov design') }}
@stop

@section('header')
@stop

@section('content')

   <div id="content-style" class="container">

    <div class="row">

        <div class="col-xs-12">

            @if(empty($row) && !empty($type->text) )
                {{ $type->text }}
            @elseif(empty($row))

                <div class="col-xs-12" id="preview">
                    <h1>Основные стили интерьера</h1>
                    <ul class="">
                        @foreach($posts as $post)
                            <li >
                                <a href="{{'/'.$type->type.'/'.$post->slug }}" class="preview">
                                    <div class="block">
                                        @if(!empty($post->image))
                                            {{ HTML::image('/upload/image/small/'.$post->image, $post->alt) }}
                                        @endif
                                    </div>
                                    <div class="descr">
                                        <p>#{{ $post->name }}</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            @elseif(!empty($row))
                <h1>{{ $row->name  }} стиль</h1>
                @if(!empty($row->image))
                    {{ HTML::image('/upload/image/'.$row->image, $row->alt) }}
                    {{ $row->text }}
                @else
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                    {{ $row->text }}
                    </div>

                @endif

                <div class="col-xs-12" id="tegs">
                    <ul class="">
                        @foreach($posts as $post)
                            <li {{ (Request::is( $type->type.'/'.$post->slug)) || (!empty($row)&&$row->parent==$post->id)? 'class="active"' : '' }} >

                                <a href="{{'/'.$type->type.'/'.$post->slug }}" class="">
                                    <div class="block">
                                        <div class="descr">
                                            <p>#{{ $post->name }}</p>
                                        </div>
                                    </div>
                                </a>

                            </li>
                        @endforeach
                    </ul>
                </div>

            @endif

        </div>






    </div>

    </div>

@stop


@section('scripts')

@stop
