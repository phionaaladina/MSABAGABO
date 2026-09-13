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
        Schema::create('about_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->nullable();
            $table->longText('history_intro')->nullable();
            $table->longText('mandate_intro')->nullable();
            $table->longText('mandate_promise')->nullable();
            $table->longText('priority_areas_intro')->nullable();
            $table->longText('leadership_intro')->nullable();
            $table->json('quick_facts')->nullable();
            $table->json('pillars')->nullable();
            $table->json('mandate_functions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_page_settings');
    }
};
