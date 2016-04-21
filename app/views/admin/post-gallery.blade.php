<div class="gallery" id="gallery">
@if(!empty($row->id))
	<br><br>
	<h3><i class="glyphicon glyphicon-th-large"></i> Галерея изображений</h3>
	<div class="row">
	@if(!empty($galleries))
		@foreach($galleries as $image)
		    @if(Session::has('success-img'.$image->id))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              {{ Session::get('success-img'.$image->id) }}
            </div>
            @endif

            @if(Session::has('error-img'.$image->id))
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              {{ Session::get('error-img'.$image->id) }}
            </div>
            @endif
			<div class="col-xs-6 col-sm-4 border" id="image-{{ $image->id }}">
				<hr>
				{{ Form::open(array('url' => 'admin/image-gallery/'.$type_id.'/'.$row->id.'/'.$image->id, 'class' => 'form-group', 'files' => true)) }}
		            <div class="">
						<div class="form-group ">
							{{ Form::label('inputImage', 'Изображение') }}
							{{ Form::file('image') }}
							<br>
							<div class="img img-thumbnail">
								{{ HTML::image($image->small_image, $image->alt, ['style'=>'height:150px; max-width:100%;']) }}
							</div>
						</div>
			            <div class="form-group ">
			                {{ Form::label('inputTextIMG', 'Описание') }}
			                {{Form::textarea('text', $image->text, array('class' => 'form-control ', 'id'=>'inputTextIMG', 'rows'=>'2')); }}
			            
		 					{{ Form::label('inputAltIMG', 'Alt (название изображения)') }}
			                {{Form::text('alt', $image->alt, array('class' => 'form-control ', 'id'=>'inputAltIMG')); }}

			            </div> 

			        </div>

		        	{{ Form::submit('Сохранить', array( 'class' => 'btn btn-default')) }}
		        	{{ HTML::link('/admin/delete/image/'.$row->id.'/'.$image->id, 'Удалить фото', array('class' => 'btn btn-default red', 'onClick' =>"return window.confirm('Вы уверены что хотите удалить изображение?')")) }}

				{{ Form::close() }}
				<hr>
			</div>	

		@endforeach
	@endif
	</div>
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
			<h4><i class="glyphicon glyphicon-picture"></i> Добавить изображение</h4>
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