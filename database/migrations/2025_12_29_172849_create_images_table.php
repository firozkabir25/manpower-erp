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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('passport_no', 150);
            $table->string('project_code', 150);
            $table->longtext('picture')->nullable();
            $table->longtext('visa_copy')->nullable();
            $table->longtext('passport_copy')->nullable();
            $table->longtext('vaccine_card')->nullable();
            $table->longtext('driving_license')->nullable();
            $table->longtext('cirtificate_one')->nullable();
            $table->longtext('cirtificate_two')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
