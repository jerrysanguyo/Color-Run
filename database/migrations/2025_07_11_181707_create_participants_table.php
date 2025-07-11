<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->enum('sex',['Male', 'Female', 'Prefer not to say']);
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->enum('shirt_size', ['XS', 'S', 'M', 'L', 'XL', 'XXL']);
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
