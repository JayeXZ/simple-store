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
    Schema::create('categories', function (Blueprint $table) {
        $table->id();                    // Auto-incrementing primary key
        $table->string('name');          // Category name e.g. Shirts
        $table->string('slug')->unique();// URL-friendly version e.g. shirts
        $table->timestamps();            // created_at and updated_at
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
