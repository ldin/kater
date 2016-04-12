@extends('home.layout')

@section('title')
    {{ !empty($row->title)? $row->title:(!empty($type->title)? $type->title:'') }}
@stop

@section('content')

    <div id="contacts" class="container-80">

        <div class="row">

            <h1>{{ $type->name }}</h1>

            <div class="col-xs-12 col-sm-5 col-sm-offset-1" >

                <form method="POST" action="/form-request"  role="form" class="contact-form">
                    <h3 class="text-center">Напишите нам</h3>
                    <div class="form-group">
                        <label for="inputName" class="sr-only">Имя</label>
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Ваше имя" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPhohe" class="sr-only">Телефон</label>
                        <input type="phone" name="phone" class="form-control" id="inputPhohe" placeholder="Ваш телефон" >
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Ваш e-mail">
                    </div>

                    <div class="form-group">
                        <label for="inputQuestion" class="sr-only">Текст сообщения</label>
                        <textarea name="text" class="form-control" id="inputQuestion" placeholder="Текст сообщения" rows='4' required></textarea>
                    </div>
                    <button type="submit" class="btn btn-main">Задать вопрос</button>
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

@stop
