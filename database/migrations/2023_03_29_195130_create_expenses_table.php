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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_profile_id");
            $table->string('category');
            $table->date('date');
            $table->string('description');
            $table->double('amount');
            $table->enum("acceptance",["accepted","rejected","pending"])->default('pending');
            $table->enum("paid_back",["paid","not_paid"])->default('paid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
