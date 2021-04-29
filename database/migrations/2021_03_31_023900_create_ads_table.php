<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->boolean('is_image_only');
            $table->string('action_link');
            $table->bigInteger('user_id');
            $table->enum('currency', ['AZN', 'USD'])->index()->deafult('AZN');
            $table->float('rate', 8, 4)->nullable()->default(1);
            $table->float('daily_budget')->nullable();
            $table->json('tags')->nullable();
            $table->enum('status', ['CREATED', 'PENDING_REVIEW', 'ACTIVE', 'INACTIVE', 'REJECTED'])->index()->nullable();
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
        Schema::dropIfExists('ads');
    }
}
