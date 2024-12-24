<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('priority', ['High', 'Medium', 'Low'])->default('Medium');
            $table->dateTime('due_date');
            $table->boolean('is_recurring')->default(false);
            $table->string('recurrence_pattern')->nullable(); // e.g., daily, weekly
            $table->boolean('is_completed')->default(false);
            $table->foreignId('delegated_to')->nullable()->constrained('users')->onDelete('set null');
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
} 