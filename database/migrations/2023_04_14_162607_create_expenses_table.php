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
            $table->string('category')->nullable();
            $table->double('amount');
            $table->double('income')->nullable();
            $table->double('money_returned')->nullable();
            $table->date('date');
            $table->string('description');
            $table->enum("status",["Accepted","Rejected","Pending"]);
            $table->enum('paid_back',["Paid Back","Not Paid Back"]);
            $table->foreignId('company_profile_id')->constrained("company_profiles")->onUpdate("cascade")->onDelete("cascade");
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
