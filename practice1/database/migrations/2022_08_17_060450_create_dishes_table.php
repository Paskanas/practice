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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restorant_id');
            $table->string('title');
            $table->unsignedFloat('price');
            $table->string('photo')->nullable();
            $table->unsignedFloat('rating')->default(0);
            $table->unsignedMediumInteger('rating_sum')->default(0);
            $table->unsignedMediumInteger('rating_count')->default(0);
            $table->string('rated_by')->default('');
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
        Schema::dropIfExists('dishes');
    }
};
