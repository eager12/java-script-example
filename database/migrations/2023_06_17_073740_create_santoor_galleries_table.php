<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantoorGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santoor_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santoor_id')->constrained('santoors')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();

            // $table->foreign('santoor_id')->references('id')->on('santoors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('santoor_galleries');
    }
}
