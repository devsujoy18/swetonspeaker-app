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
        Schema::create('page_faqs', function (Blueprint $table) {
            $table->id();
            $table->string('type', 30)->default('main_site');
            $table->string('page_type', 50)->default('page');
            $table->string('route_name')->nullable();
            $table->string('path')->nullable();
            $table->string('entity_type')->nullable();
            $table->unsignedBigInteger('entity_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedInteger('order_no')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['type', 'page_type', 'is_active']);
            $table->index(['type', 'page_type', 'slug', 'is_active']);
            $table->index(['type', 'path', 'is_active']);
            $table->index(['type', 'route_name', 'is_active']);
            $table->index(['type', 'entity_type', 'entity_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_faqs');
    }
};
