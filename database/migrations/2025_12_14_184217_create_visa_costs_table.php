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
        Schema::create('visa_costs', function (Blueprint $table) {
            $table->id();
            $table->string('edition', 2);
            $table->unsignedBigInteger('profession_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('visa_project_id')->nullable();
            $table->date('date')->nullable();

            $table->decimal('cost', 15, 2)->default(0.00);

            $table->unsignedBigInteger('cr_ledger')->nullable();
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->longText('note')->nullable();

            $table->decimal('visacostbdt', 15, 2)->default(0.00);
            $table->decimal('visa_currency_rate', 15, 2)->default(0.00);
            $table->decimal('visa_conversion_rate', 15, 2)->default(0.00);

            $table->unsignedBigInteger('currency_id')->nullable();
            
            $table->foreign('profession_id')->references('id')->on('professions')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('visa_project_id')->references('id')->on('projects')->onDelete('set null');
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('set null');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_costs');
    }
};
