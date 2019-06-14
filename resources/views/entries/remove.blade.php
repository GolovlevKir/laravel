{{-- Это шаблон формы удаления товара из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit entry --}}
@section('title', __('Remove entries'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
<h1>{{__('Remove entry')}}</h1>
    {{-- Форма предъявляется методом HTTP DELETE на веб­‑адрес: products/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($entry, [
            'method' => 'DELETE',
            'route'  => [
                'entries.destroy',
                $entry->id,
            ]
        ])
    }}

    {{-- Выводим наименование товара --}}
    {{ $entry->title }}

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Remove entry'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection