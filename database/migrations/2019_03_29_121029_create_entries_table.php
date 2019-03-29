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
