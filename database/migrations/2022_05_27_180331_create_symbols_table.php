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
        Schema::create('symbols', function (Blueprint $table) {
            $table->id();
            $table->string('symbol', 255);
            $table->string('name', 255);
            $table->bigInteger('number');
            $table->string('volume')->nullable();
            $table->string('value')->nullable();
            $table->bigInteger('price_yesterday')->nullable();
            $table->bigInteger('price_first')->nullable();
            $table->string('last_transaction_amount')->nullable();
            $table->string('last_transaction_changed')->nullable();
            $table->string('last_transaction_percentage')->nullable();
            $table->string('final_price_amount')->nullable();
            $table->string('final_price_change')->nullable();
            $table->string('final_price_percentage')->nullable();
            $table->bigInteger('price_least')->nullable();
            $table->bigInteger('price_most')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['symbol', 'volume']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('symbols');
    }
};
