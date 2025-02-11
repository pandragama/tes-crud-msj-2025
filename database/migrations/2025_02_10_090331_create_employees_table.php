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
            $table->foreignId('dept_id')->nullable()->constrained('departments')->nullOnDelete();
            $table->string('firstname', length: 100)->nullable();
            $table->string('lastname', length: 100)->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('address', length: 100)->nullable();
            $table->date('dob')->nullable();
            $table->enum('status', ['cont', 'emp', 'not_act'])->default('cont');
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
