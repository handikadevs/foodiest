<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myrecept', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_id')->nullable();
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->unsignedBigInteger('cake_id')->nullable();
            $table->foreign('cake_id')->references('id')->on('cakes')->onDelete('cascade');
            $table->unsignedBigInteger('drink_id')->nullable();
            $table->foreign('drink_id')->references('id')->on('drinks')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->enum('category', ['food', 'cake', 'drink', 'other'])->nullable();
            $table->text('ingredient')->nullable();
            $table->text('step')->nullable();
            $table->text('thumbnail')->nullable();
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
        Schema::dropIfExists('myrecept');
    }
};
