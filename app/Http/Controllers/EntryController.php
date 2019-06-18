<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEntryRequest;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Извлекаем из БД коллекцию товаров,
        // отсортированных по возрастанию значений атрибута title
        $entries = Entry::orderBy('title', 'ASC')->get();
        // Использовать шаблон resources/views/products/index.blade.php, где…
        return view('entries.index')->withEntries($entries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Форма добавления продукта в БД.
        // Создаём в ОЗУ новый экземпляр (объект) класса Product.
        $entry = new Entry();

        // Использовать шаблон resources/views/products/create.blade.php, в котором…
        return view('entries.create')->withEntry($entry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntryRequest $request)
    {
        // Добавление продукта в БД
        // Принимаем из формы значения полей с name, равными title, price.
        $attributes = $request->only(['title', 'content']);
        $attributes['user_id'] = $request->user()->id;
        // Создаём кортеж в БД.
        $entry = Entry::create($attributes);

        // Создаём всплывающее сообщение об успешном сохранении в БД:
        // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
        // (см. resources/lang/ru/messages.php).
        $request->session()->flash(
            'message',
            __('Created', ['title' => $entry->title])
        );

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('entries.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry)
    {
        // Форма редактирования продукта в БД.
        // Использовать шаблон resources/views/products/edit.blade.php, в котором…
        return view('entries.edit')->withEntry($entry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
                // Редактирование продукта в БД.

        // Принимаем из формы значения полей с name, равными title, price.
        $attributes = $request->only(['title', 'content']);

        // Обновляем кортеж в БД.
        $entry->update($attributes);

        // Создаём всплывающее сообщение об успешном обновлении БД
        $request->session()->flash(
            'message',
            __('Updated', ['title' => $entry->title])
        );

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('entries.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Entry $entry)
    {
        // Удаляем товар из БД.
        $entry->delete();

        // Создаём всплывающее сообщение об успешном удалении из БД
        $request->session()->flash(
            'message',
            __('Removed', ['title' => $entry->title])
        );

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('entries.index'));
    }

     /**
     * Show the form for removing the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function remove(Entry $entry)
    {
        $this->authorize('delete', $entry);
        // Использовать шаблон resources/views/products/remove.blade.php, где…
        // …переменная $producs ⁠— это объект товара.
        return view('entries.remove')->withEntry($entry);

    }

    public function __construct()
{
    // $this->authorizeResource(Entry::class);
}
}
