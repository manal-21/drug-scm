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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->string('employee_address');
            $table->string('employee_email');
            $table->string('employee_phone');
            $table->string('employee_telephone');
            $table->string('employee_password');
            $table->foreignId('head_user_id')->nullable()->constrained('head_users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('employees');

        Schema::table('employees', function (Blueprint $table) {
            $table->dropConstrainedForeignId('head_user_id');
        });
    }
};
