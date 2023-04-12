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
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->enum("gender",["male","female"])->default('male');
            $table->foreignId('user_id')->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->string('work_type');
            // $table->string("work_type")->nullable()->constrained('users')->nullOnDelete();
            // $table->foreignId('work_type_id')->constrained("company_profiles")->onUpdate("cascade")->onDelete("cascade");
            $table->double('phone_no')->unique();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
