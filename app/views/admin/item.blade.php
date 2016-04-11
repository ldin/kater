@extends('admin.layout')

@section('sidebar')
    <h4><i class="glyphicon glyphicon-arrow-left"></i>  <a href="/admin/content/1/{{$post_id}}">вернуться</a></h4>
    <p>Объекты в категории:</p>
    @if(isset($posts) )
        <ul class="nav menu">
            @foreach ($posts as $key => $post)
                <li class="dropdown  {{ (Request::is('admin/item/'.$post->post_id.'/'.$post->id)) ? 'active' : '' }}" >
                    {{ HTML::link('admin/item/'.$post->post_id.'/'.$post->id, $post->name) }}
                </li>
            @endforeach
        </ul>
    @endif
    <p><br>
        <?php echo HTML::decode(HTML::link('/admin/item/'.$post_id.'/add', '<i class="glyphicon glyphicon-plus"></i>&nbsp;Добавить', array('class'=>'addNews'))); ?>
    </p>

@stop

@section('content')
<div>

<h3><i class="glyphicon glyphicon-list-alt"></i> Объект</h3>
<br>

{{ Form::open(array('url' => 'admin/item/'.(isset($post_id)?$post_id:'add').'/'.(isset($row['id'])?$row['id']:'') , 'class' => 'form-group', 'files' => true)) }}

    <div class="tab-content">
        <div class="form-group {{ ($errors->first('name')) ? 'has-error' : '' }}">
            {{ Form::label('inputName', 'Название*') }}
            {{ Form::text('name', (isset($row->name)?$row->name:''), array('class'=>'form-control', 'id'=>'inputName')); }}
        </div>
        <div class="form-group {{ ($errors->first('title')) ? 'has-error' : '' }}">
            {{ Form::label('inputTitle', 'Title*', array('class'=>'control-label')) }}
            {{ Form::text('title', (isset($row->title)?$row->title:''), array('class' => 'form-control', 'id'=>'inputTitle')); }}
            {{ ($errors->first('title')) ? Form::label('error', 'Некорректный Title', array('class'=>'control-label')) : '' }}
        </div>

        <div class="form-group {{ ($errors->first('slug')) ? 'has-error' : '' }}">
            {{ Form::label('inputSlug', 'URL', array('class'=>'control-label')) }}
            <small><p class="info-txt">Только латинские символы, цифры, дефис. <i>При незаполненом поле URL генерируется из названия</i></p></small>

            {{ Form::text('slug', (isset($row->slug)?$row->slug:''), array('class' => 'form-control', 'id'=>'inputSlug')); }}
            {{ ($errors->first('slug')) ? Form::label('error', 'Некорректный URL', array('class'=>'control-label')) : '' }}
        </div>


        <div class="row">
            <div class="form-group col-sm-6 col-xs-12">
                {{ Form::label('selectParent', 'Родительская категория') }}
                {{ Form::select('post_id', $parents, (isset($post_id)?$post_id:''), array('class' => 'form-control', 'id'=>'selectParent'))}}
            </div>
        </div>

        <div class="row">

            <div class="form-group form-inline col-sm-6 col-xs-12">
                {{ Form::text('order', (isset($row->order)?$row->order:''), array('class' => 'form-control order-select', 'id'=>'selectOrder'))}}
                {{ Form::label('selectOrder', 'Порядок вывода на сайте') }}
                <small><p class="info-txt">Только для коллекций</p></small>

            </div> 
            <div class="form-group col-sm-6 col-xs-12">
                <div class="checkbox">
                  <label>
                    {{ Form::checkbox('status', '1', (isset($row->status)&&($row->status==false)?'':array('checked')) )  }}
                    Показывать на сайте <span class="info-txt">( иначе доступ только из админки)</span>
                  </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('inputText', 'Текст') }}
            {{Form::textarea('text', (isset($row->text)?$row->text:''), array('class' => 'form-control ', 'id'=>'inputText')); }}
        </div>

        <div class="row">
<!--             <div class="form-group col-sm-8 col-xs-12">
                {{ Form::label('inputPreview', 'Превью') }}
                {{Form::textarea('preview', (isset($row->preview)?$row->preview:''), array('class' => 'form-control ', 'id'=>'inputPreview', 'rows'=>'5')); }}
            </div> -->
            <div class="form-group col-sm-4 col-xs-12">
                {{ Form::label('inputImage', 'Изображение') }}
                {{ Form::file('image') }}
                <p class="info-txt">(только для шаблонов "картинка-текст")</p>
                @if(isset($row->image)&&($row->image))
                    <br>
                    <div class="img img-thumbnail">
                        {{ HTML::image('/upload/image/small/'.$row->image, 'img') }}
                    </div>
                @endif
            </div>
        </div>

        <p><label>Свойства:</label></p>
        <div class="form-group col-xs-11 col-xs-offset-1">
        @foreach($properties as $prop)
                {{ Form::label($prop->slug, $prop->name) }}
                {{ Form::text('prop['.$prop->id.']', '', array('class'=>'form-control', 'id'=>'inputName')); }}

            @endforeach
        </div>

        <div class="form-group">
            {{ Form::label('seo_description') }}
            {{ Form::text('seo_description', (isset($row->seo_description)?$row->seo_description:''), array('class' => 'form-control')); }}
        </div>
        <div class="form-group">
            {{ Form::label('seo_keywords') }}
            {{ Form::text('seo_keywords', (isset($row->seo_keywords)?$row->seo_keywords:''), array('class' => 'form-control')); }}
        </div>
        <br />
        {{ Form::label('', '') . Form::submit('Сохранить', array( 'class' => 'btn btn-success')) }}
        @if(isset($row['id']))
              {{ HTML::link('/admin/delete/page/'.$post_id.'/'.$row['id'], 'Удалить раздел', array('class' => 'btn btn-danger', 'onClick' =>"return window.confirm('Вы уверены что хотите удалить статью?')")) }}
        @endif

    </div>
    {{ Form::close() }}
</div>



@stop

@section('scripts')
<script type="text/javascript" >
    $(document).ready(function() {
        var ckeditorText = CKEDITOR.replace( 'inputText' );
        AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditorText});

        // var ckeditorPreview = CKEDITOR.replace( 'inputPreview', {
        //  toolbarGroups: [
        //         {"name":"basicstyles","groups":["basicstyles"]},
        //         {"name":"links","groups":["links"]},
        //         {"name":"paragraph","groups":["list","blocks"]},
        //         {"name":"document","groups":["mode"]},
        //         {"name":"insert","groups":["insert"]},
        //         {"name":"styles","groups":["styles"]}
        //     ],
        //     removeButtons: 'Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        //     });
        // AjexFileManager.init({returnTo: 'ckeditorPreview', editor: ckeditorPreview});

    });

</script>

@stop


