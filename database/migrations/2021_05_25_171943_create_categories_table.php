<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id_category');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('name');
            $table->string('literal_name')->nullable();
            $table->string('descr', 400)->nullable();
            $table->string('literal_descr', 400)->nullable();
            $table->string('img');
            $table->string('color')->nullable();
            $table->boolean('status')->default(true);

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('categories');
    }
}
