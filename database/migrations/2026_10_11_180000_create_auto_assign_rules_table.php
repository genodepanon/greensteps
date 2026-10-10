<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('auto_assign_rules')) {
            return;
        }

        Schema::create('auto_assign_rules', function (Blueprint $table) {
            $table->id();
            $table->string('category_match', 200);
            $table->string('team_name', 150);
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
            $table->index('is_active');
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        // The legacy table may predate this migration; preserve it and its rules.
    }
};