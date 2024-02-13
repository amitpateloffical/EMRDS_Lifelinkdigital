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
        Schema::create('employee_information', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('preEmployement_status')->default('Not-Completed');
            $table->string('preEmployement_completion')->nullable();
            $table->string('preEmployement_due')->nullable();
            $table->string('periodic_status')->default('Not-Completed');
            $table->string('periodic_completion')->nullable();
            $table->string('periodic_due')->nullable();
            $table->string('annualHealth_status')->default('Not-Completed');
            $table->string('annualHealth_completion')->nullable();
            $table->string('annualHealth_due')->nullable();
            $table->string('vaccination_status')->default('Not-Completed');
            $table->string('vaccination_completion')->nullable();
            $table->string('vaccination_due')->nullable();
            $table->string('vaccination_type')->nullable();
            $table->string('eyeTest_status')->default('Not-Completed');
            $table->string('eyeTest_completion')->nullable();
            $table->string('eyeTest_due')->nullable();
            $table->string('chestXray_status')->default('Not-Completed');
            $table->string('chestXray_completion')->nullable();
            $table->string('chestXray_due')->nullable();
            $table->string('exitMedical_status')->default('Not-Completed');
            $table->string('exitMedical_completion')->nullable();
            $table->string('exitMedical_due')->nullable();
            $table->string('bioMedical_status')->default('Not-Completed');
            $table->string('bioMedical_completion')->nullable();
            $table->string('bioMedical_due')->nullable();
            $table->string('firstAdd_status')->default('Not-Completed');
            $table->string('firstAdd_completion')->nullable();
            $table->string('firstAdd_due')->nullable();
            $table->string('opd_status')->default('Not-Completed');
            $table->string('opd_completion')->nullable();
            $table->string('opd_due')->nullable();
            $table->string('hepB_status')->default('Not-Completed');
            $table->string('hepB_completion')->nullable();
            $table->string('hepB_due')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_information');
    }
};
