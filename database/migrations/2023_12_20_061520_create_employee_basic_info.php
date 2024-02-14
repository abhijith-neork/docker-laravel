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
      
        Schema::create('employee_basic_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('employee_code');
            $table->string('first_name');
            $table->string('last_name')->nullable(true);
            $table->string('gender',10)->nullable(true);
            $table->string('blood_group',10)->nullable(true);
            $table->string('marital_status',10)->nullable(true);
            $table->date('dob');
            $table->text('address');
            $table->string('email');
            $table->string('company_mail');
            $table->string('phone');
            $table->string('aadhaar');
            $table->string('emergency_contact_name_1')->nullable(true);   
            $table->string('emergency_contact_relation_1')->nullable(true);   
            $table->string('emergency_contact_phone_1')->nullable(true);   
            $table->string('emergency_contact_name_2')->nullable(true);   
            $table->string('emergency_contact_relation_2')->nullable(true);   
            $table->string('emergency_contact_phone_2')->nullable(true);   
            $table->string('image')->nullable(true);
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_basic_info');
    }
};
