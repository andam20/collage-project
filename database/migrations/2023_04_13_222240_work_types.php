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
        Schema::create('work_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->foreignId('company_profiles_id')->constrained("company_profiles")->onUpdate("cascade")->onDelete("cascade");
            // $table->foreignId('company_profile_id');
            // $table->foreignId('company_profile_id')->constrained("company_profiles")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
