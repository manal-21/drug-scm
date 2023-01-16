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
        Schema::create('role_details', function (Blueprint $table) {
            $table->id();
            $table->string('first_task');
            $table->string('second_task');
            $table->string('third_task');
            $table->foreignId('role_id')->nullable()->constrained('role')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('employee_id')->nullable()->constrained('employees')->onUpdate('cascade')->onDelete('cascade');            
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
        Schema::dropIfExists('role_details');

        Schema::table('role_details', function (Blueprint $table) {
            $table->dropConstrainedForeignId('role_id');
            $table->dropConstrainedForeignId('employee_id');
        });
    }
};
