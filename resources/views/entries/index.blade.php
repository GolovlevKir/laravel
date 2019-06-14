{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Entry --}}
@section('title', __('Entry'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
<h1>{{__('Entries')}}</h1>
    <p>
        {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
        {{
            Html::secureLink(
                route('entries.create'),
                __('Create entry')
            )
        }}
    </p>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Content') }}</th>
                <th>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                    </span>
                </th>
                <th>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true">
                    </span>
                </th>
            </tr>
            @foreach ($entries as $entry)
                <tr>
                    <td>{{ $entry->title }}</td>
                    <td>{{ $entry->content }}</td>
                    <td>@can('update', $entry) 
{{ Html::secureLink( 
route('entries.edit', $entry->id), 

__('Edit entry') 

) }} 
@else 
@endcan 
</td> 
                    <td>@can('delete', $entry) 
{{ 

Html::secureLink( 
route('entries.remove', $entry->id), 
__('Remove entry') 
) 
}} 
@else 
@endcan</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection