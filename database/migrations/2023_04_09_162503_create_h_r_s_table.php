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
        Schema::create('h_r_s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob');
            $table->date('start_date');
            $table->enum("gender",["male","female"])->default('male');
            $table->string('email')->unique();
            $table->string('phone_no')->unique();
            $table->double('salary');
            $table->string('address');
            $table->string('password');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h_r_s');
    }
};
