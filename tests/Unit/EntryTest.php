<?php

namespace Tests\Unit;

use App\Entry;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use App\Entry;

class EntryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->expectException(\Exception::class);
        $entry = new Entry();
        $entry -> title = null;
        $entry->content = 'Новая новость';
        $entry->user_id = 5;
        $entry->save();
        
        // $entry = new Entry();
        // $entry -> title = 'dhbhjbdhjsabdhjbashjdbsjahdbhajsbdhjasbdhjbashjdbashjdbsahjdbhajsbdhjabsdbajshdbahsdbhabsdhjabdsjhabdhjbashjdbhajsdbhjsabdhjasbdjhabdhjsabhdasbdhjsabdhjabdhjabsdhjsbahdbahjdbsajhdbhjasbdjhasbdhjasbdhjasbhdjbashjdbashjdbashjdbashjdbahjsdbhajsbdhajsbdhjsabdhjsabdhjasbdhjasbdhajsbdhajsbdhjasdbhjasbdhjasbdhjasbdhjsabdhjabsdhjasbdhjbashjdbsahjdbsahjdbhjasbdajhsdbhjasbdhjasbdhjsabdjhasbdhjabsdhajsbdhjasbdhjsabdhjasbdhjasbdhjasbdhjasbdhjasbdhasbdhjsabd';
        // $entry->content = 'Новая новость';
        // $entry->user_id = 1;
        // $entry->save();
    }
    
    // // Trait, отменяющий изменения в БД
    // // после выполнения каждого тестового варианта.
    // use RefreshDatabase;

    // /**
    //  * Тест вставки кортежа в таблицу БД.
    //  *
    //  * @return void
    //  */
    // public function testInsertingIntoDB()
    // {
    //     // Метод factory() возвращает фабрику объектов класса Product.
    //     // Метод create() создаёт соответствующий кортеж в БД.
    //     // Ссылка на объект записывается в переменную $product.
    //     $entry = factory(Entry::class)->create();

    //     // assertDatabaseHas() проверяет таблицу на наличие указанных данных.
    //     // $product->getTable() возвращает имя таблицы БД ⁠— products.
    //     // $product->toArray() возвращает массив значений свойств.
    //     $this->assertDatabaseHas($entry->getTable(), $entry->toArray());
    // }

    // /**
    //  * Тест изменения кортежа в таблице БД.
    //  *
    //  * @return void
    //  */
    // public function testUpdatingInDB()
    // {
    //     // Создаём объект в ОЗУ и кортеж в БД.
    //     $old_entry = factory(Entry::class)->create();
    //     // Создаём ещё один объект, но только в ОЗУ.
    //     $new_entry = factory(Entry::class)->make();
    //     // Обновляем кортеж данными из второго объекта.
    //     $old_entry->update($new_entry->toArray());
    //     // Проверяем, обновлён ли кортеж.
    //     $this->assertDatabaseHas(
    //         $old_entry->getTable(),
    //         $old_entry->toArray()
    //     );
    // }

    // /**
    //  * Тест удаления кортежа из таблицы БД.
    //  *
    //  * @return void
    //  */
    // public function testDeletingFromDB()
    // {
    //     // Создаём объект в ОЗУ и кортеж в БД.
    //     $entry = factory(Entry::class)->create();
    //     // Удаляем кортеж.
    //     $entry->delete();
    //     // Проверяем, удалён ли кортеж.
    //     $this->assertDatabaseMissing($entry->getTable(), $entry->toArray());
    // }
}
