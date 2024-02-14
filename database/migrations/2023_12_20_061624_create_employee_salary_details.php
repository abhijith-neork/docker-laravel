<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_salary_details', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('user_id');
            $table->string('basic_pay');
            $table->string('da')->nullable(true);
            $table->string('pf_contribution')->nullable(true);
            $table->text('hra')->nullable(true);
            $table->string('bank_name')->nullable(true);
            $table->string('branch')->nullable(true);
            $table->string('account_number')->nullable(true);
            $table->string('ifsc')->nullable(true);
            $table->unsignedBigInteger('created_by');
            $table->tinyInteger('status')->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_salary_details');
    }
};
