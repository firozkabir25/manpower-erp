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
        // if (Schema::hasTable('visa_blocks')) {
            Schema::create('visa_blocks', function (Blueprint $table) {
                $table->id();
                $table->date('date')->nullable();
                $table->unsignedBigInteger('company_id')->nullable();
                $table->string('block_number')->nullable();
                $table->unsignedBigInteger('sponsor_id')->nullable();
                $table->string('alwaka_no')->nullable();
                $table->decimal('quantity', 15, 4)->default(0);
                $table->unsignedBigInteger('visa_profession')->nullable();
                $table->unsignedBigInteger('licence_id')->nullable();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->boolean('active')->default(1);
                $table->timestamps();

                $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
                $table->foreign('sponsor_id')->references('id')->on('sponsors')->onDelete('set null');
                $table->foreign('visa_profession')->references('id')->on('visa_professions')->onDelete('set null');
                $table->foreign('licence_id')->references('id')->on('licences')->onDelete('set null');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            });
            
        // };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_blocks');
    }
};
