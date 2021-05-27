<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id_transaction');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_account')->nullable();
            $table->unsignedBigInteger('id_category')->nullable();
            $table->unsignedBigInteger('id_currency')->nullable();
            $table->string('subject', 250)->nullable();
            $table->double('quantity', 10, 2);
            $table->string('type_transaction', 20);

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_account')->references('id_account')->on('accounts')->onDelete('set null');
            $table->foreign('id_category')->references('id_category')->on('categories')->onDelete('set null');
            $table->foreign('id_currency')->references('id_currency')->on('currencies')->onDelete('set null');

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
        Schema::dropIfExists('transactions');
    }
}
