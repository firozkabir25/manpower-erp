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
        if (!Schema::hasTable('countries')) {
            Schema::create('countries', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->string('short', 15);
                $table->unsignedBigInteger('user_id');
                $table->decimal('visa_expire_days', 15, 0)->default(0);
                $table->decimal('police_expire_days', 15, 0)->default(0);
                $table->decimal('medical_expire_days', 15, 0)->default(0);
                $table->longText('overseas_status')->nullable();
                $table->longText('expense_id')->nullable();
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
        Schema::dropIfExists('countries');
    }
};
