{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit product --}}
@section('title', __('Edit entry'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
<h1>{{__('Edit entry')}}</h1>
    {{-- Форма предъявляется методом HTTP PUT на веб­‑адрес: products/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($entry, [
            'method' => 'PUT',
            'route'  => [
                'entries.update',
                $entry->id,
            ]
        ])
    }}

    {{-- Включаем шаблон resources/views/entries/partials/form.blade.php --}}
    @include('entries.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Update entry'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection