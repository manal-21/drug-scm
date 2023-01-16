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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('order_description');
            $table->date('order_date');
            $table->float('order_total_cost',8,2);
            $table->foreignId('seller_id')->nullable()->constrained('head_users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('buyer_id')->nullable()->constrained('head_users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('orders');

        Schema::table('orders', function (Blueprint $table) {
            $table->dropConstrainedForeignId('seller_id');
            //$table->dropConstrainedForeignId('buyer_id');
        });
    }
};
