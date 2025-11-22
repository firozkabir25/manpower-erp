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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('currency', 20);
            $table->unsignedBigInteger('user_id');
            $table->string('currency_code', 3)->nullable();
            $table->string('currency_symbol', 10)->nullable();
            $table->decimal('_value', 15, 4)->default(0);
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnUpdate();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
