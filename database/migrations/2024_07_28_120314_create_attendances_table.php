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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // Date of attendance
            $table->string('name'); // Name of the employee
            $table->time('arrival'); // Arrival time
            $table->time('departure')->nullable(); // Departure time
            $table->string('status');

            $table->boolean('is_signed_out')->default(false); // Added through different migration, delete mo siguro?

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
