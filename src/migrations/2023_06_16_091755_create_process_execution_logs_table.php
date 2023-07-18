<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('process_execution_logs', function (Blueprint $table) {
            $table->id();
            $table->string('class_type')->nullable();
            $table->string('class_name')->nullable();
            $table->string('status')->nullable();
            $table->longText('details')->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('process_execution_logs');
    }
};
