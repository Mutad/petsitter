<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id');
            $table->string('name');
            $table->string('image')->default('default.jpg');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->longText('description');
            $table->enum('type', ['cat','dog']);
            $table->decimal('weight', 5, 2);
            $table->decimal('hourly_rate', 15, 2);
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
        Schema::dropIfExists('pets');
    }
}
