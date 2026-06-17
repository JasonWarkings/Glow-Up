<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->boolean('discount_active')->default(false);

            // либо фикс цена
            $table->integer('discount_price')->nullable();

            // либо процент
            $table->integer('discount_percent')->nullable();

            // время акции (по желанию, но правильно)
            $table->timestamp('discount_start')->nullable();
            $table->timestamp('discount_end')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'discount_active',
                'discount_price',
                'discount_percent',
                'discount_start',
                'discount_end',
            ]);
        });
    }
};