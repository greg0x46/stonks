<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id');
            $table->unsignedBigInteger('wallet_id');
            $table->enum('type', ['B', 'S']);
            $table->date('executed_at');
            $table->float('amount');
            $table->float('price');
            $table->float('fee_percentage')->default(0);
            $table->float('fee')->default(0);
            $table->timestamps();

            $table->foreign('asset_id')
                ->references('id')
                ->on('assets');

            $table->foreign('wallet_id')
                ->references('id')
                ->on('wallets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
