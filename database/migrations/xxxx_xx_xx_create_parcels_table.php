<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('tracking_number')->unique();
            $table->string('current_location')->nullable();
            $table->string('status')->default('Pending');
            $table->dateTime('estimated_delivery')->nullable();
            $table->timestamps();
            // Additional fields for sender, recipient, weight, dimensions, etc.
        });

        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('tracking_number')->unique();
            $table->string('status')->default('pending');
            $table->timestamps();
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('parcels');
    }
} 