@extends('home.layout')

@section('title')
    {{ !empty($row->title)? $row->title:(!empty($type->title)? $type->title:'') }}
@stop

@section('header')
@stop

@section('content')

    <div id="content-text" class="container-80">

            @if(isset($posts)&&count($posts)>0)

                @foreach($posts as $post)
                    <div class="row">
                            {{ $post->text }}
                    </div>
                @endforeach

            @endif

    </div>

    @if(!empty($type->text))
        <div class="text-block">
            <div class="container-80">
                <div class="row">

                        {{$type->text}}

                </div>
            </div>
        </div>
    @endif

@stop


@section('scripts')

@stop
