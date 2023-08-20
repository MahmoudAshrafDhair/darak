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
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->string('main_image')->nullable();
            $table->text('name');
            $table->tinyInteger('type')->default(0)->comment( ' 0 => sale , 1 => rent');
            $table->integer('living_num')->default(0);
            $table->integer('rooms_num')->default(0);
            $table->integer('bathroom_num')->default(0);
            $table->integer('space')->default(0);
            $table->integer('age')->default(0);
            $table->longText('description')->nullable();
            $table->double('price')->default(0);
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('region_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('real_estates');
    }
};
