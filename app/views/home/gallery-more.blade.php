@foreach($post->photos as $image)
    <div class="item">
        <a class="fancybox" rel="gallery" href="{{ $image->image }}" title="{{ $image->text }}" style="background-image: url({{$image->small_image}})">
            {{--                                    {{ HTML::image($image->small_image, $image->alt) }}--}}
        </a>
    </div>
@endforeach