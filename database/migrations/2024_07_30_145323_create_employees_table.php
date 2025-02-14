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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile_number'); // Corrected from varchar to string
            $table->string('emergency_mobile_number');
            $table->string('bank');
            $table->string('account_number');
            $table->string('email'); // Changed from text to string
            $table->integer('salary');
            $table->string('gender');
            $table->string('department');
            $table->string('photo')->nullable();
            $table->string('status')->default('Unpaid');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};