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
            $table->id();
            $table->decimal('value');
            $table->integer('type');
            $table->string('detail')->default('');
            $table->string('payment_form');
            $table->datetime('realization_date');
            $table->foreignId('user_id');
            $table->datetime('payment_date')->nullable();
            $table->integer('status');
            $table->foreignId('bank_id'); 
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
