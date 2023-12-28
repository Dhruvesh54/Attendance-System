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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->date('joining_date');
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('mobile');
            $table->string('job_title');
            $table->string('gender');
            $table->string('password');
            $table->string('status')->default('inactive');
            $table->string('role')->default('employee');
            $table->string('ip_address')->nullable(true);
            $table->string('last_login_time')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
