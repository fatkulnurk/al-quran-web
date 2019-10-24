<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyahTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayah_translation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('surah_id');
            $table->unsignedBigInteger('ayah_id');
            $table->unsignedBigInteger('translation_id');
            $table->string('number');
            $table->text('content');
            $table->timestamps();

            $table->unique(['ayah_id', 'translation_id', 'number']);

            $table->foreign('surah_id')
                ->references('id')
                ->on('surah')
                ->onDelete('cascade');

            $table->foreign('ayah_id')
                ->references('id')
                ->on('ayah')
                ->onDelete('cascade');

            $table->foreign('translation_id')
                ->references('id')
                ->on('translation')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ayah_translation');
    }
}
