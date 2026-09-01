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
        Schema::create('qr_code_scans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_qr_code_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('source', 20);
            $table->string('scan_token', 26)->unique();
            $table->string('ip_address', 45)->nullable();
            $table->string('device', 50)->nullable();
            $table->text('user_agent')->nullable();
            $table->decimal('latitude', 5, 2)->nullable();
            $table->decimal('longitude', 5, 2)->nullable();
            $table->unsignedInteger('location_accuracy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_code_scans');
    }
};
