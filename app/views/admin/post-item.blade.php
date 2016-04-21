<div class="gallery" id="gallery">
@if(!empty($row->id))
	<br><br>
	<h3><i class="glyphicon glyphicon-th-large"></i> Объекты на странице</h3>

	@if(!empty($items))
		@foreach($items as $item)

			<div class="col-xs-12 col-sm-3">
				<a href="/admin/item/{{$row->id}}/{{$item->id}}">
					<p>{{ $item->name }}</p>
					{{ HTML::image('/upload/image/item/small/'.$item->image, 'img', ['style'=>'max-width:100%;']) }}

				</a>
			</div>

		@endforeach
	@endif

	<div class="clearfix"></div><br><br>
	<a href="/admin/item/{{$row->id}}/add" class="addNews">
		<i class="glyphicon glyphicon-plus"></i>&nbsp;Добавить объект
	</a>



@endif


</div>