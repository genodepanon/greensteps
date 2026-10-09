<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained('reports')->cascadeOnDelete();
            $table->string('team_name', 150);
            $table->enum('status', ['Assigned','In Progress','Completed','Rejected'])->default('Assigned');
            $table->string('title', 200);
            $table->string('location', 300);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->enum('priority', ['Critical','High','Medium','Low'])->default('Medium');
            $table->string('reporter', 150)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('before_photo', 500)->nullable();
            $table->string('after_photo', 500)->nullable();
            $table->text('notes')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->string('rejected_by', 150)->nullable();
            $table->dateTime('rejected_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};