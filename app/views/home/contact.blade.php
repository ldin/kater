@extends('home.layout')

@section('title')
    {{ !empty($row->title)? $row->title:(!empty($type->title)? $type->title:'') }}
@stop

@section('content')

    <div id="contacts" class="container-80">

        <div class="row">

            <h1>{{ $type->name }}</h1>

            <div class="col-xs-12 col-sm-5 col-sm-offset-1" >

                <form method="POST" action="/form-request"  role="form" class="contact-form" id="js-form-contact">
                    <h3 class="text-center">Напишите нам</h3>
                    <div class="form-group">
                        <label for="inputName" class="sr-only">Имя</label>
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Ваше имя" required>
                        <p class="red">Поле "Имя" должно быть заполнено</p>
                        {{ ($errors->first('name')) ? Form::label('error', 'Поле "Имя" должно быть заполнено', array('class'=>'control-label')) : '' }}

                    </div>
                    <div class="form-group">
                        <label for="inputPhohe" class="sr-only">Телефон</label>
                        <input type="phone" name="phone" class="form-control" id="inputPhohe" placeholder="Ваш телефон" >
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Ваш e-mail">
                        <p class="red hide">Поле "Email" должно быть заполнено</p>
                        {{ ($errors->first('email')) ? Form::label('error', 'Поле "email" должно быть заполнено', array('class'=>'control-label')) : '' }}

                    </div>

                    <div class="form-group">
                        <label for="inputQuestion" class="sr-only">Текст сообщения</label>
                        <textarea name="text" class="form-control" id="inputQuestion" placeholder="Текст сообщения" rows='4' required></textarea>
                        <p class="red hide">Сообщение не может быть пустым</p>
                        {{ ($errors->first('email')) ? Form::label('error', 'Сообщение не может быть пустым', array('class'=>'control-label')) : '' }}

                    </div>
                    <button type="submit" class="btn btn-main js-btn-submit">Задать вопрос</button>
                </form>
            </div>

            <div class="col-xs-12 col-sm-5" >
                @if(empty($row))
                    {{ $type->text }}
                @endif
            </div>

        </div>

    </div>

@stop

@section('footerMap')
    <div id="footerMap2">
        <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=SLLPxyPGVQ5OzL0vjZn6TfTJYpzUEvqF&width=100%&height=420&lang=ru_RU&sourceType=constructor"></script>
    </div>
@stop

@section('scripts')

    <script type="text/javascript" >
        $(document).ready(function() {

            $('.js-btn-submit').on('click', function(){
//                var form = $(this);
//                var submit = $('.js-btn-submit');
                var errors = false;

//                console.log(form.find('#inputName').val());

                if( $('#inputName').val() =='' || $('#inputName').val().length < 3) {
                    errors  = true;
                    form.find('#inputName + p').show();
                }

                if( $('#inputEmail').val() =='' || $('#inputEmail').val().length < 3) {
                    errors  = true;
                    form.find('#inputName + p').show();
                }

                if( $('#inputText').val() =='' || $('#inputText').val().length < 3) {
                    errors  = true;
                    form.find('#inputName + p').show();
                }
                console.log(errors);
                if(errors) {return false};
                return false;

            })
        });
    </script>

@stop
