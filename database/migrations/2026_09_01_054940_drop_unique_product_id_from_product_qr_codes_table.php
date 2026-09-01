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
        Schema::table('product_qr_codes', function (Blueprint $table) {
            $table->index('product_id');
            $table->dropUnique(['product_id']);
            $table->unique(['product_id', 'source']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_qr_codes', function (Blueprint $table) {
            $table->dropUnique(['product_id', 'source']);
            $table->dropIndex(['product_id']);
            $table->unique('product_id');
        });
    }
};
