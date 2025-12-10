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
        if (!Schema::hasTable('acc_ledgers')) {
            Schema::create('workers', function (Blueprint $table) {
                $table->id();
                $table->date('date')->nullable();
                $table->integer('project_id')->nullable();
                $table->integer('interview_ref')->nullable();
                $table->string('passport_no', 15);
                $table->string('name', 60);
                $table->string('fathers_name', 60)->nullable();
                $table->string('mothers_name', 60)->nullable();
                $table->date('date_of_birth')->nullable();
                $table->date('passport_issue_date')->nullable();
                $table->date('passport_expire_date')->nullable();
                $table->text('birth_place')->nullable();
                $table->foreignId('working_profession_id')->constrained('working_professions')->cascadeOnUpdate()->nullable();
                $table->foreignId('country_id')->constrained('countries')->cascadeOnUpdate()->nullable();
                $table->string('grade', 20)->nullable();
                $table->decimal('basic_salary', 15, 4)->default(0.0000);
                $table->string('education', 60)->nullable();
                $table->string('overseas_experiance', 20)->nullable();
                $table->string('religion', 20)->nullable();
                $table->foreignId('district_id')->constrained('districts')->cascadeOnUpdate()->nullable();
                $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->nullable();
                $table->string('nationality', 30)->default('Bangladeshi')->nullable();
                $table->string('local_experience', 20)->nullable();
                $table->longText('address')->nullable();
                $table->foreignId('local_agent_id')->constrained('local_agents')->cascadeOnUpdate()->nullable();
                $table->string('gender', 10);
                $table->longText('note')->nullable();
                $table->string('contact', 15)->nullable();
                $table->string('pp_issue_place', 60)->nullable();
                $table->string('marital_status', 2)->nullable();
                $table->string('selection_type', 20)->default('Non Interviewed');
                $table->integer('sales_edition')->default(1);
                $table->integer('visa_edition')->default(1);
                $table->string('year', 4)->nullable();
                $table->enum('active', ['1','0'])->default('1');
                $table->integer('pob')->nullable();
                $table->integer('picture')->nullable();
                $table->integer('passport_copy')->nullable();
                $table->integer('vaccin_card')->nullable();
                $table->integer('visa_copy')->nullable();
                $table->decimal('special_offer', 15, 4)->default(0.0000);
                $table->string('remarks_on_offer', 60)->nullable();
                $table->string('project_code', 60)->nullable();
                $table->date('pc_issue_date')->nullable();
                $table->date('medical_date')->nullable();
                $table->string('medical_result', 10)->nullable();
                $table->decimal('gross_salary', 15, 4)->default(0.0000);
                $table->string('worker_type', 60)->nullable();
                $table->string('skill_certificate', 100)->nullable();
                $table->string('pc_number', 50)->nullable();
                $table->date('pc_date')->nullable();
                $table->string('medical_status', 10)->default('Fit');
                $table->decimal('salesedition_price', 15, 4)->default(0.0000);
                $table->string('contact_number', 20)->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
