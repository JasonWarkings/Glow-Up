<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('promo_code')->nullable();
            $table->integer('promo_discount')->default(0);
            $table->integer('discount_amount')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'promo_code',
                'promo_discount',
                'discount_amount'
            ]);
        });
    }
};