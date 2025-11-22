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
        if (!Schema::hasTable('sponsors')) {
            Schema::create('sponsors', function (Blueprint $table) {
                $table->id();
                $table->string('sponsor_id', 30)->unique();
                $table->string('name', 100)->nullable();
                $table->string('name_arabic', 100)->nullable();
                $table->string('user_id', 60);
                $table->string('address', 300)->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsors');
    }
};
