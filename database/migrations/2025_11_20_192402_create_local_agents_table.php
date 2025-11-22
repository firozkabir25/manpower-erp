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
        Schema::create('local_agents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->decimal('nid', 20, 0)->default(0);     
            $table->string('phone', 60)->nullable();
            $table->string('email', 30);
            $table->longText('address')->nullable();
            $table->unsignedBigInteger('user_id');         
            $table->unsignedBigInteger('code')->default(0);
            $table->unsignedBigInteger('ledger_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate();
            $table->foreign('ledger_id')->references('id')->on('acc_ledgers')->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('local_agents');
    }
};
