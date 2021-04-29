<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('website');
            $table->string('logo');
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->index()->nullable();
            $table->enum('currency', ['AZN', 'USD'])->index()->deafult('AZN');
            $table->float('rate', 8, 4)->nullable()->default(1);
            $table->float('average_click_price')->nullable();
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
        Schema::dropIfExists('tenants');
    }
}
