<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantoorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santoors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('description')->nullable();
            $table->string('instrumentType')->nullable();
            $table->string('WoodType')->nullable();
            $table->string('buildDate')->nullable();
            $table->string('price')->nullable();
            $table->unsignedBigInteger('pOrder')->default(0);
            $table->boolean('selled')->default(0);
            $table->json('meta')->nullable();


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
        Schema::dropIfExists('santoors');
    }
}