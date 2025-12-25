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
        Schema::create('sales_prices', function (Blueprint $table) {
            $table->id();
            $table->string('edition', 2);
            $table->unsignedBigInteger('profession_id')->nullable()->default(null);
            $table->decimal('price', 20,2)->default(0.00);
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->unsignedBigInteger('project_id')->nullable()->default(null);
            $table->string('code', 60)->nullable()->default(null);
            $table->date('date')->nullable()->default(null);
            $table->longtext('remark')->nullable()->default(null);
            $table->decimal('currency_rate', 20,2)->default(0.00);
            $table->decimal('conversion_rate', 20,2)->default(0.00);
            $table->unsignedBigInteger('currency_id')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('profession_id')->references('id')->on('professions')->onDelete('set null');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_prices');
    }
};
