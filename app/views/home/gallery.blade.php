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

                    <div class="">
                        {{ $post->text  }}
                    </div>
                    @if(!empty($post->photos))

                        <div class="masonry">

                            @include('home.gallery-more')

                            <div id="galleriesMore"></div>

                            <div class="clearfix"></div>

                            <button type="button" id="loading-btn" data-loading-text="Loading..." class="btn btn-primary noradius"  data-postid="{{$post->id}}">
                                Показать ещё
                            </button>

                            <div class="clearfix"></div>

                            <div class="hide">{{ $post->photos->links() }}</div>

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

    $('#loading-btn').click(function () {
        var btn = $(this);
        btn.button('loading');
        console.log($('.item').length);
        $.ajax({
            url: "more-photos",
            cache: false,
            data: {
                postId: btn.data('postid'),
                offset:$('.item').length
            },
            type: "POST",
            beforeSend: function(request) {  // нужно для защиты от CSRF
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function(html) { $('#galleriesMore').append(html);}
        }).always(function () {
            btn.button('reset');
        });
        return false;
    });

  </script>
@stop
