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
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->string('trade_name');
            $table->string('scientific_name');
            $table->string('drug_description');
            $table->date('production_date');
            $table->date('expiration_date');
            $table->string('drug_dose');
            $table->string('drug_cost');
            $table->foreignId('drug_type_id')->nullable()->constrained('drug_type')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('drugs');

        Schema::table('drugs', function (Blueprint $table) {
            $table->dropConstrainedForeignId('drug_type_id');
        });
    }
};
