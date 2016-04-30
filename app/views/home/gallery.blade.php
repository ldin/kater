@extends('home.layout')

@section('title')
    {{ !empty($row->title)? $row->title:(!empty($type->title)? $type->title:'') }}
@stop

@section('header')

    <meta name="csrf-token" content="<?php echo csrf_token(); ?>">

    {{ HTML::style('/css/gallery.css') }}

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="/modules/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="/modules/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <style type="text/css">
    .fancybox-title-outside-wrap{
        background-color: rgba(0,0,0,0.7);
        padding: 10px;
        margin-top: -40px;
        bottom: 0;
        width: 100%;
        position: absolute;
    }
    </style>
@stop

@section('content')

    <div id="content-gallery" class="container">

    <div class="row row-content">

        <div class="col-xs-12 ">

            @if(!empty($type->text) && empty($row))
                {{ $type->text }}
            @endif

            @if(isset($posts)&&count($posts)>0)

                @foreach($posts as $post)

                    <div class="item">
                        {{ $post->text  }}
                    </div>
                    @if(!empty($post->gallerie))

                        <div class="masonry">

                            @foreach($post->gallerie as $image)
                                <div class="item">
                                  <a class="fancybox" rel="gallery" href="{{ $image->image }}" title="{{ $image->text }}" style="background-image: url({{$image->small_image}})">
{{--                                    {{ HTML::image($image->small_image, $image->alt) }}--}}
                                  </a>
                                </div>
                            @endforeach
                            <div class="clearfix"></div>

                            <button type="button" id="loading-example-btn" data-loading-text="Loading..." class="btn btn-primary noradius" style="margin:0px auto">
                              Показать ещё
                            </button>

                            {{--<code lang="html">--}}
                                {{--<div id="galleriesMore"></div>--}}
                            {{--</code>--}}


                            {{ $post->gallerie->links() }}

                        </div>

                    @endif
                @endforeach

            @endif


        </div>

    </div>


    </div>

@stop


@section('scripts')
  <!-- Add mousewheel plugin (this is optional) -->
  <script type="text/javascript" src="/modules/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

  <!-- Add fancyBox -->
  <script type="text/javascript" src="/modules/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

  <!-- Optionally add helpers - button, thumbnail and/or media -->
  <script type="text/javascript" src="/modules/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
  <script type="text/javascript" src="/modules/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

  <link rel="stylesheet" href="/modules/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
  <script type="text/javascript" src="/modules/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>


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
            overlay: {
              locked: false
            }
          }
      });
    });

    $('#loading-example-btn').click(function () {
        var btn = $(this)
        btn.button('loading')
        $.ajax({
            url: "more", // url запроса
            cache: false,
            data: { ids: ids }, // если нужно передать какие-то данные
            type: "POST", // устанавливаем типа запроса POST
            beforeSend: function(request) {  // нужно для защиты от CSRF
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function(html) { $('#galleriesMore').append(html);} //контент подгружается в div#content
        }).always(function () {
            btn.button('reset')
        });
        return false
    });

  </script>
@stop
