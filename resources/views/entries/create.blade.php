{{-- Это шаблон формы добавления товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">



{{-- В секции title родительского шаблона будет выведен перевод фразы: Create product --}}
@section('title', __('Create entry'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<h1>{{__('Create entry')}}</h1>

    {{-- Форма предъявляется методом HTTP POST на маршрут products.create --}}
    {{
        Form::model($entry, [
            'method' => 'POST',
            'route'  => 'entries.store'
        ])
    }}

    {{-- Включаем шаблон resources/views/entries/partials/form.blade.php --}}
    @include('entries.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Save entry'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}
<!-- подключаем jquery -->

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<!-- подключаем bootstrap.js -->

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

<!-- подключаем сам summernote -->

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>

<script>

$(document).ready(function() {

    $('#content').summernote();

});

</script>
    {{ Form::close() }}

@endsection