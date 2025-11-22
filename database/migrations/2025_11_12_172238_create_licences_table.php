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
        if (!Schema::hasTable('licences')) {
            Schema::create('licences', function (Blueprint $table) {
                $table->id('id');
                $table->string('licence', 100)->unique()->nullable();
                $table->string('rlno', 30)->unique()->nullable();
                $table->unsignedBigInteger('user_id');         
                $table->string('address', 200)->nullable();
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate();

            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licence');
    }
};
