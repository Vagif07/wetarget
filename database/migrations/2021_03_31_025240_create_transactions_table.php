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
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->index()->nullable();
            $table->enum('paid_by', ['BONUS', 'GIFT_CARD', 'CASH', 'CREDIT_CARD', 'OTHER'])->index()->nullable();
            $table->enum('type', ['IN', 'OUT'])->index()->deafult('IN');
            $table->enum('who', ['USER', 'ADMIN'])->index()->deafult('USER');
            $table->enum('currency', ['AZN', 'USD'])->index()->deafult('AZN');
            $table->float('rate', 8, 4)->nullable()->default(1);
            $table->float('amount')->nullable();
            $table->text('note')->nullable();
            $table->text('extra_data')->nullable();
            $table->timestamp('done_at')->nullable();
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
