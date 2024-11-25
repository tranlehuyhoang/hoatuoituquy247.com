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
            $table->string('bank_brand_name')->nullable();
            $table->string('account_number')->nullable();
            $table->dateTime('transaction_date')->nullable();
            $table->decimal('amount_out', 15, 2)->default(0.00)->nullable();
            $table->decimal('amount_in', 15, 2)->default(0.00)->nullable();
            $table->decimal('accumulated', 15, 2)->default(0.00)->nullable();
            $table->text('transaction_content')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('code')->nullable();
            $table->string('sub_account')->nullable();
            $table->foreignId('bank_account_id')->nullable();
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
