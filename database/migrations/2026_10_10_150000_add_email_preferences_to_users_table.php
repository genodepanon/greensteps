<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('users', 'email_on_notifications')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('email_on_notifications')->default(true);
            });
        }

        if (!Schema::hasColumn('users', 'email_on_status')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('email_on_status')->default(true);
            });
        }
    }

    public function down(): void
    {
        $columns = array_values(array_filter(
            ['email_on_notifications', 'email_on_status'],
            fn (string $column) => Schema::hasColumn('users', $column)
        ));

        if ($columns) {
            Schema::table('users', function (Blueprint $table) use ($columns) {
                $table->dropColumn($columns);
            });
        }
    }
};