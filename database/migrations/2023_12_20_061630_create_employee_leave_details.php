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
        Schema::create('employee_leave_details', function (Blueprint $table) {
            $table->id();   
            $table->unsignedBigInteger('user_id');
            $table->string('no_of_leaves_alloted');
            $table->date('effective_from')->nullable(true);
            $table->date('effective_to')->nullable(true);
            $table->unsignedBigInteger('leave_type_id');
            $table->unsignedBigInteger('created_by');
            $table->tinyInteger('status')->default(1);
            $table->foreign('leave_type_id')->references('id')->on('leave_types');
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
        Schema::dropIfExists('employee_leave_details');
    }
};