<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->enum('climate',['жаркий', 'умеренный', 'холодный']);
            $table->enum('language',['русский', 'английский', 'немецкий', 'испанский', 'готов изучать местный']);
            $table->enum('living',['высокий', 'средний', 'ниже среднего' , 'низкий']);
            $table->enum('location_type',['мегаполис','небольшой город', 'у моря', 'у озера/реки', 'в горах']);
            $table->boolean('way_home');
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
        Schema::dropIfExists('countries');
    }
}
