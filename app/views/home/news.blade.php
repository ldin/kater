@extends('home.layout')

@section('title')
    {{ !empty($row->title)? $row->title:(!empty($type->title)? $type->title:'Asafov design') }}
@stop

@section('header')
@stop

@section('content')

    <div id="content-news" class="container-80">

    <div class="row row-content">

        <div class=" ">


            @if(!empty($type->text) && empty($row))
                {{ $type->text }}
            @endif

            @if(!empty($row->text))
                <p class="date">{{ date( 'd.m.Y', strtotime($row->created_at)) }}</p>
                <h1>{{$row->name}}</h1>
                {{$row->text}}
                <br><a href="javascript:history.back(1)" >назад</a>

            @endif

            @if(isset($posts)&&count($posts)>0)
               <?php $k=0; ?>

                {{--<h1>Новости</h1>--}}

                @foreach($posts as $post)
                <div class="news-item col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="part img" style="background-image: url('/upload/image/small/{{$post->image}}');">
                    </div>
                    <p class="date">{{ date( 'd.m.Y', strtotime($post->created_at)) }}</p>

                    <a href="{{$type->type.'/'.$post->slug}}"><h3>{{ $post->name }}</h3></a>

                    <div class="preview">
                        {{ $post->preview }}
                        <div class="text-right">
                            <p>{{ HTML::link( $type->type.'/'.$post->slug, 'читать далее' ) }} </p>
                        </div>
                    </div>
                </div>    

                <?php
                       $k++;
                       if(($k%2)==0) {echo('<div class="clearfix visible-sm-block"></div>'); }
                       if(($k%3)==0) {echo('<div class="clearfix visible-md-block"></div>'); }
                       if(($k%4)==0) {echo('<div class="clearfix visible-lg-block"></div>'); }
                ?>

                @endforeach

                {{ $posts->links() }}       

            @endif
        </div>

    </div>


    </div>

@stop


@section('scripts')

@stop
