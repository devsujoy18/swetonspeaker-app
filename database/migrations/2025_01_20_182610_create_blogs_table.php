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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['blog', 'event']);
            $table->string('title');
            $table->string('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->date('publish_date')->nullable();
            $table->string('author')->nullable();
            $table->string('video_link')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('order_no')->default(0);
            $table->boolean('is_current_event')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
