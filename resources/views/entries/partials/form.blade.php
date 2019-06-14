{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}

<div class="form-group">
    {{-- Метка к полю ввода наименования товара --}}
    {{-- На метке будет выведен перевод слова Title --}}
    {{ Form::label('title', __('Title')) }}

    {{-- Поле ввода наименования товара --}}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{-- Метка к полю ввода цены товара --}}
    {{-- На метке будет выведен перевод слова Content --}}
    {{ Form::label('content', __('Content')) }}

    {{-- Поле ввода цены товара --}}
    {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content']) }}
</div>