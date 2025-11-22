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
        if (!Schema::hasTable('acc_ledgers')) {
            Schema::create('acc_ledgers', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('group_id')->nullable();
                $table->string('ledger', 60)->unique();
                $table->string('address', 150)->nullable();
                $table->string('phone', 100)->nullable();
                $table->string('email', 30)->nullable();
                $table->decimal('credit_limit', 15, 0)->default(0);
                $table->decimal('balance', 15, 4)->default(0);
                $table->unsignedBigInteger('user_id')->nullable();
                $table->timestamps();

                $table->foreign('group_id')->references('id')->on('acc_groups')->cascadeOnUpdate()->nullOnDelete();
                $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->nullOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acc_ledgers');
    }
};
