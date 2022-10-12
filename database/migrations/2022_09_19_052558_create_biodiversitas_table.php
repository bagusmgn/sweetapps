<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodiversitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodiversitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('field_id')->nullable();
            $table->unsignedBigInteger('species_id')->nullable();
            $table->string('local_name', 255);
            $table->string('latin_name', 255)->nullable();
            $table->string('category', 255);
            $table->integer('age')->unsigned();
            $table->integer('amount')->unsigned();
            $table->longText('description', 255)->nullable();
            $table->string('cover', 255)->nullable();
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
        Schema::dropIfExists('biodiversitas');
    }
}
