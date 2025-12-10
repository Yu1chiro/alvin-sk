<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            
            // Hero Section
            $table->string('hero_title')->default('Alvin Sk.');
            $table->string('hero_subtitle')->nullable(); // Quote / Role
            
            // About Section
            $table->text('about_description')->nullable();
            $table->string('about_image')->nullable(); // Foto Profil
            $table->json('skills')->nullable(); // Skill Bubbles
            
            // Styling
            $table->string('theme_color')->default('#000000');
            $table->string('background_color')->default('#ffffff');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};