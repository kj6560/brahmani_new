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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('Company_Name')->nullable();
            $table->string('Office_Address')->nullable();
            $table->string('Official_Number')->nullable();
            $table->string('Official_Email')->nullable();
            $table->string('Facebook_Link')->nullable();
            $table->string('Instagram_Link')->nullable();
            $table->string('Twitter_Link')->nullable();
            $table->string('Pinterest_Link')->nullable();
            $table->string('Linkedin_Link')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
