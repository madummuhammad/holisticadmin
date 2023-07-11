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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 255)->primary();
            $table->string('no_hp', 20);
            $table->string('password', 255);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255);
            $table->string('country', 255);
            $table->enum('type', ['profesional', 'seeker', 'both']);
            $table->string('password_text', 255);
            $table->tinyInteger('active')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
