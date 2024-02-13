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
        Schema::create('pre_employments', function (Blueprint $table) {
            $table->id();
            $table->string('record')->nullable();
            $table->string('parent')->nullable();
            $table->string('initiator')->nullable();
            $table->string('due_date')->nullable();
            $table->string('short_description')->nullable();
            $table->string('canditate_id')->nullable();
            $table->string('purpose')->nullable();
            $table->string('schedule')->nullable();
            $table->string('external_attachment')->nullable();
            $table->string('comments')->nullable();
            $table->string('medical_officer_name')->nullable();
            //--------Medical Officer--------
            $table->string('blood_pressure')->nullable();
            $table->string('height')->nullable();
            $table->string('temperature')->nullable();
            $table->string('pulse')->nullable();
            $table->string('oxygen')->nullable();
            $table->string('weight')->nullable();
            $table->string('notes')->nullable();
            $table->string('investigation_request')->nullable();
            $table->string('nurshing_staff')->nullable();
            $table->string('medicalOfficerRemarks')->nullable();
            $table->string('FollowUpRequired')->nullable();
            $table->text('MediFollowUpComment')->nullable();
            $table->date('medicalFollwoDueDate')->nullable();
            $table->string('organ')->nullable();
            $table->text('detail')->nullable();
            // ----------------------------------------
            $table->string('systolic')->nullable();
            $table->string('diastolic')->nullable();
            $table->string('heart_rate')->nullable();
            $table->string('respiratory_rate')->nullable();
            $table->string('systolic2')->nullable();
            $table->string('diastolic2')->nullable();
            //-------------Nurshing staff-----------
            $table->string('medical_history')->nullable();
            $table->string('bmi')->nullable();
            $table->string('vision_test')->nullable();
            $table->string('blood_reports')->nullable();
            $table->string('other_reports')->nullable();
            $table->string('observation')->nullable();
            $table->string('result')->nullable();
            $table->string('nurshing_staff_comments')->nullable();
            $table->string('criteria')->nullable();
            $table->string('grid_medical_comment')->nullable();
            //-------------pre-exam
            $table->string('Followup_dueDate')->nullable();
            $table->string('pre_imployement_physicalExam')->nullable();
            $table->string('abnormal_finding')->nullable();
            $table->string('abnormal_finding_Comments')->nullable();
            $table->string('Followup_action')->nullable();
            $table->string('Followup_Comments')->nullable();
            $table->string('HOD_approval_status')->nullable();
            $table->string('HOD_name')->nullable();
            $table->string('HOD_comments')->nullable();
            $table->string('HR_comments')->nullable();
            $table->string('HR_Final_comments')->nullable();
            $table->string('report_title')->nullable();
            $table->string('clouser_comment')->nullable();
            $table->string('clouser_attachment')->nullable();
            $table->text('medicalComment')->nullable();
            // ------------------------------------------------------------
            $table->date('medicalDate')->nullable();
            $table->string('medicalRemark')->nullable();
            $table->string('medicalFollowUpReq')->nullable();
            $table->text('medicalFollowComment')->nullable();
            $table->text('OHCHeadRemarks')->nullable();
            $table->text('OHCHeadComment')->nullable();
            $table->string('status')->nullable();
            $table->string('stage')->default(1);
            $table->string('initiation_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_employments');
    }
};
