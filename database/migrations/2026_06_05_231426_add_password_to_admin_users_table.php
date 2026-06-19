<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('admin_users', function (Blueprint $table) {

        if (!Schema::hasColumn('admin_users', 'phone')) {
            $table->string('phone')->nullable()->after('email');
        }

        if (!Schema::hasColumn('admin_users', 'password')) {
            $table->string('password')->after('phone');
        }

        if (!Schema::hasColumn('admin_users', 'remember_token')) {
            $table->rememberToken()->after('password');
        }

    });
}

public function down(): void
{
    Schema::table('admin_users', function (Blueprint $table) {
        $table->dropColumn(['phone', 'password', 'remember_token']);
    });
}
};
