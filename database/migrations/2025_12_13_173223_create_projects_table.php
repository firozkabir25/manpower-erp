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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('country_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('foreign_agent_id')->nullable()->constrained('foreign_agents')->nullOnDelete();

            $table->decimal('total_visa',15,0)->default(0);
            $table->date('start_date')->nullable();
            $table->date('document_receive_date')->nullable();

            $table->foreignId('profession_id')->nullable()->constrained('professions')->nullOnDelete();
            $table->longText('visa_block')->nullable();
            $table->longText('description')->nullable();

            $table->string('name')->nullable();
            $table->string('reference')->nullable();
            $table->string('project')->nullable();
            $table->string('cost_center_id')->nullable()->constrained('acc_cost_centers')->nullOnDelete();;
            $table->string('project_code')->nullable();
            $table->string('type')->default('0');
            $table->date('doc_date')->nullable();

            $table->foreignId('currency_id')->nullable()->constrained('currencies')->nullOnDelete();
            $table->foreignId('source_id')->nullable()->constrained('sources')->nullOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->nullOnDelete();

            $table->enum('active',['1','0'])->default('0');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
