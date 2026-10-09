<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('team_name', 150);
            $table->foreignId('task_id')->unique()->constrained('tasks')->cascadeOnDelete();
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->decimal('accuracy', 10, 2)->nullable();
            $table->timestamp('recorded_at')->useCurrent();
            $table->timestamps();
            $table->index(['team_name', 'recorded_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_locations');
    }
};