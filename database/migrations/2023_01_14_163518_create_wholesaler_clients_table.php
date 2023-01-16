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
        Schema::create('wholesaler_clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wholesaler_id')->nullable()->constrained('wholesalers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('retailer_id')->nullable()->constrained('retailers')->onUpdate('cascade')->onDelete('cascade');            
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
        Schema::dropIfExists('wholesaler_clients');

        Schema::table('employees', function (Blueprint $table) {
            $table->dropConstrainedForeignId('wholesaler_id');
            $table->dropConstrainedForeignId('retailer_id');
        });
    }
};
