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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->nullable();
            $table->string('short_name', 20)->nullable();
            $table->string('name_arabic', 200)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('id_number', 15);
            $table->string('contact_by', 60)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('email', 30);
            $table->string('phone', 25);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
