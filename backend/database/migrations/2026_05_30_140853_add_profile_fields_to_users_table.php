<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {

        if (!Schema::hasColumn('users', 'phone')) {
            $table->string('phone')->nullable()->after('email');
        }

        if (!Schema::hasColumn('users', 'lastName')) {
            $table->string('lastName')->nullable()->after('name');
        }

        if (!Schema::hasColumn('users', 'birthday')) {
            $table->date('birthday')->nullable()->after('phone');
        }

        if (!Schema::hasColumn('users', 'gender')) {
            $table->string('gender')->nullable()->after('birthday');
        }

        if (!Schema::hasColumn('users', 'bonuses')) {
            $table->integer('bonuses')->default(0)->after('gender');
        }

        if (!Schema::hasColumn('users', 'status')) {
            $table->string('status')->default('active')->after('bonuses');
        }

    });
}

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'lastName',
                'birthday',
                'gender'
            ]);

        });
    }
};