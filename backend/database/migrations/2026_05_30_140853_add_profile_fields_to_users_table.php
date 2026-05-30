<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('lastName')->nullable()->after('name');
            $table->date('birthday')->nullable()->after('phone');
            $table->string('gender')->nullable()->after('birthday');

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