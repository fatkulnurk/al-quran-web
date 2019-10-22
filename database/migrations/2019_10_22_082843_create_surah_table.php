<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_arabic');
            $table->string('name_alphabet');
            $table->string('name_indonesia');
            $table->string('name_english');
            $table->string('number_of_surah');
            $table->string('number_of_ayah');
            $table->string('number_of_verses');
            $table->string('relevation_number');
            $table->string('relevation_type');
            $table->text('description_indonesia');
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
        Schema::dropIfExists('surah');
    }
}
