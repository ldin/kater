@section('header')
	@parent
    {{ HTML::style('/modules/dropzone/dropzone.css') }}
@stop
<div class="gallery" id="gallery">
@if(!empty($row->id))
	<br><br>
	<h3><i class="glyphicon glyphicon-th-large"></i> Галерея изображений</h3>
	<div class="row">
	@if(!empty($galleries))
		@foreach($galleries as $image)

			@if(Session::has('success-img'.$image->id))
			<div class="alert alert-success col-xs-12">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  {{ Session::get('success-img'.$image->id) }}
			</div>
			@endif
			@if(Session::has('error-img'.$image->id))
			<div class="alert alert-danger col-xs-12">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  {{ Session::get('error-img'.$image->id) }}
			</div>
			@endif

			<div class="col-xs-6 col-sm-4 col-md-3" id="img-{{$image->id}}">

				<div class="cellule cellule-img" id="image-{{ $image->id }}" >
					{{ Form::open(array('url' => 'admin/image-gallery/'.$type_id.'/'.$row->id.'/'.$image->id, 'class' => 'form-group', 'files' => true)) }}

						<div class="form-group ">
							{{ Form::label('inputImage', 'Изображение', ['class'=>'sr-only']) }}
							{{ Form::file('image') }}
						</div>

						<div class="img" style="background-image: url(/{{$image->small_image}})">
						</div>
						<div class="form-group ">
							{{ Form::label('inputTextIMG', 'Описание', ['class'=>'sr-only']) }}
							{{Form::textarea('text', $image->text, array('class' => 'form-control ', 'id'=>'inputTextIMG', 'rows'=>'1', 'placeholder'=>'Описание')); }}
						</div>
						<div class="form-group ">
							{{ Form::label('inputAltIMG', 'Alt (название изображения)', ['class'=>'sr-only']) }}
							{{Form::text('alt', $image->alt, array('class' => 'form-control ', 'id'=>'inputAltIMG', 'placeholder'=>'alt')); }}
						</div>

						<div class="work">
							<div class="left">
								<button type="submit"><i class="glyphicon glyphicon-floppy-disk"></i></button>
								<a href="/{{$image->image}}" title="Увеличить" class="fancybox" >
									<i class="glyphicon glyphicon-search"></i>
								</a>


							</div>
							<div class="right">
								<a href="#" class="deleteImageDropzone" data-id="{{$image->id}}" data-item="{{$row->id}}">
									<i class="glyphicon glyphicon-trash"></i>
								</a>
							</div>
							<div class="clearfix"></div>
						</div>

					{{ Form::close() }}

				</div>
			</div>

		@endforeach
	@endif
	</div>

	<h3>Быстрая загрузка</h3>

	<form action="/admin/image-dropzone/gallery/{{$row->id}}" class="dropzone" id="my-dropzone" method="POST" files="true">
		<div class="dz-message">
			<h4>Загрузите фото</h4>
			<p>или кликните сюда</p>
		</div>
    </form>

	<h3>Загрузить с описанием</h3>

	<div class="row bg-info" id="image-add">

		    @if(Session::has('success-imgadd'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              {{ Session::get('success-imgadd') }}
            </div>
            @endif

            @if(Session::has('error-imgadd'))
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              {{ Session::get('error-imgadd') }}
            </div>
            @endif

		<div class="col-xs-12">
			{{ Form::open(array('url' => 'admin/image-gallery/'.$type_id.'/'.$row->id, 'class' => 'form-group', 'files' => true)) }}
	            <div class="row">
		            <div class="form-group col-sm-8 col-xs-12">
		                {{ Form::label('inputTextIMG', 'Описание') }}
		                {{Form::textarea('text', '', array('class' => 'form-control ', 'id'=>'inputTextIMG', 'rows'=>'5')); }}
		            
	 					{{ Form::label('inputAltIMG', 'Alt (название изображения)') }}
		                {{Form::text('alt', '', array('class' => 'form-control ', 'id'=>'inputAltIMG')); }}

		            </div> 
		            <div class="form-group col-sm-4 col-xs-12">
		                {{ Form::label('inputImage', 'Изображение') }}
		                {{ Form::file('image') }}

		            </div>
		        </div>
	        	{{ Form::submit('Добавить', array( 'class' => 'btn btn-success')) }}
			{{ Form::close() }}
		</div>
	</div>
	<br><br><br>

@endif


</div>

@section('scripts')
	@parent

    {{ HTML::script('/modules/dropzone/dropzone.js') }}

    <script type="text/javascript" >
        $(document).ready(function() {

            $(".deleteImageDropzone").on('click', function(){
                var id = $(this).data('id');
                var item = $(this).data('item');
                $.ajax({
                    url: '/admin/delete-image-dropzone/gallery/'+item+'/'+id,
                    type: "GET",
                    success: function(data){
                        if(data == 'true') {
                            $('#img-' + id).hide();
                        }
                    }
                });
                return false;
            });

        });
    </script>

@stop