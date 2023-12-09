<?php

// database/migrations/[timestamp]_create_purchase_transactions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('merchandise_id');
            $table->integer('quantity');
            $table->decimal('total_amount', 10, 2);
            $table->timestamp('transaction_date')->useCurrent();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('merchandise_id')->references('merchandise_id')->on('merchandises');
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
        Schema::dropIfExists('purchase_transactions');
    }
}
