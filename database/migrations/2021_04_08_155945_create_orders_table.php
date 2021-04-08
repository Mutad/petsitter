<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id');
            $table->foreignId('reciever_id');
            $table->foreignId('sitter_id');
            $table->boolean('pet_confirmed')->default(false);
            $table->boolean('sitter_confirmed')->default(false);
            $table->decimal('hours',5,2);
            $table->decimal('hourly_cost',5,2);
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
        Schema::dropIfExists('orders');
    }
}
