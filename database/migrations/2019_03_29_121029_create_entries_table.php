<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) 
        {
            //Атрибут ID с первичным ключом
            $table->bigIncrements('id');
            //Строковый атрибут title
            $table->string('title');
            //Атрибут content текстового типа
            $table->text('content');

            // НАЧАЛО БЛОКА ИЗМЕНЕНИЙ
            $table->bigInteger('user_id')  // Атрибут manufacturer_id
                  ->unsigned();                 // беззнакового целого типа
            //$table->engine = 'InnoDB';        // Тип таблицы
            //$table->index('manufacturer_id'); // Индексация manufacturer_id
            $table->foreign('user_id')  // Создание внешнего ключа,
                  ->references('id')            // ссылающегося на атрибут id
                  ->on('users')         // в таблице manufacturers,
                  ->onDelete('CASCADE')         // разрешающего удалять
                                                // производителя
                                                // вместе с сопоставленными продуктами
                  ->onUpdate('RESTRICT')        // и запрещающим изменение id
                                                // в manufacturers
            ;
            // КОНЕЦ БЛОКА ИЗМЕНЕНИЙ

            //Тип datetime 
            //Атрибуты created_at и updated_at 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
