<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_id')->constrained('users')->cascadeOnDelete();
            $table->string('category', 200);
            $table->text('description');
            $table->string('location', 300);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('photo_url', 500)->nullable();
            $table->enum('status', ['Pending','Assigned','In Progress','Completed','Rejected'])->default('Pending');
            $table->enum('priority', ['Critical','High','Medium','Low'])->default('Medium');
            $table->string('assigned_team', 150)->nullable();
            $table->text('rejection_reason')->nullable();
            $table->string('rejected_by', 150)->nullable();
            $table->dateTime('rejected_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};