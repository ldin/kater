<div class="gallery" id="items">
@if(!empty($row->id))
	<br><br>
	<h3><i class="glyphicon glyphicon-th-large"></i> Объекты на странице</h3>

	@if(!empty($items))
		@foreach($items as $item)

			<div class="col-xs-6 col-sm-4 col-md-3">
				<div class="cellule item">
					<p>{{ $item->name }}</p>
					<div class="img">
						{{ HTML::image('/upload/image/item/small/'.$item->image, 'img') }}
					</div>
					<div class="work">
						<div class="left">
							<a href="/admin/item/{{$row->id}}/{{$item->id}}" title="редактировать">
								<i class="glyphicon glyphicon-edit"></i>
							</a>
						</div>
						<div class="right">

							<i class="glyphicon glyphicon-trash"></i>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

		@endforeach
	@endif

	<div class="clearfix"></div><br><br>
	<a href="/admin/item/{{$row->id}}/add" class="addNews">
		<i class="glyphicon glyphicon-plus"></i>&nbsp;Добавить объект
	</a>



@endif


</div>