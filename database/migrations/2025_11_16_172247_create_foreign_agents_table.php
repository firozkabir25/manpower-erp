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
        if (!Schema::hasTable('foreign_agents')) {
            Schema::create('foreign_agents', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->unsignedBigInteger('country_id')->nullable();
                $table->string('email', 30);
                $table->string('phone', 20);
                $table->string('address', 300);
                $table->string('user_id', 60);
                $table->unsignedBigInteger('ledger_id')->nullable();
                $table->timestamps();

                $table->foreign('country_id')
                    ->references('id')->on('countries')
                    ->cascadeOnUpdate();

                $table->foreign('ledger_id')
                    ->references('id')->on('acc_ledgers')
                    ->cascadeOnUpdate();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foreign_agents');
    }
};
