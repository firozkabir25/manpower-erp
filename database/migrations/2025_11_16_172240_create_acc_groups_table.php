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
        Schema::create('acc_groups', function (Blueprint $table) {
            $table->id();
            $table->string('related', 60);
            $table->string('group', 60);
            $table->string('sort', 20);

            $table->enum('purchase', ['1', '0'])->default('0');
            $table->enum('sales', ['1', '0'])->default('0');
            $table->enum('show', ['1', '0'])->default('0');

            $table->unsignedBigInteger('user_id')->nullable();

            $table->unique('group');
            $table->index('related');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acc_groups');
    }
};
