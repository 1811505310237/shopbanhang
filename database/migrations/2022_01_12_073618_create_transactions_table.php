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
            $table->tinyInteger('tr_user_id')->default(0);
            $table->bigInteger('tr_total_money');
            $table->string('tr_name')->nullable();
            $table->string('tr_email')->nullable();
            $table->string('tr_phone')->nullable();
            $table->string('tr_address')->nullable();
            $table->string('tr_note')->nullable();
            $table->tinyInteger('tr_status')->nullable();
            $table->tinyInteger('tr_type')->nullable()->comment('1-cod, 2-online');
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
