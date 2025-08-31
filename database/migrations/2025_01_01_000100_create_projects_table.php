<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('summary', 500)->nullable();
            $table->longText('description')->nullable();
            $table->string('role', 120)->nullable();
            $table->unsignedTinyInteger('team_size')->nullable();
            $table->date('timeline_start')->nullable();
            $table->date('timeline_end')->nullable();
            $table->json('tech_stack')->nullable();
            $table->string('repo_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->json('metrics')->nullable();
            $table->string('hero_image_path')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->timestamp('published_at')->nullable()->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};


