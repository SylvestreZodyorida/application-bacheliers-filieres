<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('entry_mode', ['classement', 'concours']);
            $table->foreignId('series_id')->constrained('series')->onDelete('cascade');
            $table->string('url')->default('null');
            $table->foreignId('user_id')->constrained('users');
            $table->float('average')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
