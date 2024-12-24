<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('return_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Assuming you have an orders table
            $table->string('reason');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');// Requested, Approved, Processing, Completed
            $table->string('attachment')->nullable(); // For proof of return or damage
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('return_requests');
    }
};