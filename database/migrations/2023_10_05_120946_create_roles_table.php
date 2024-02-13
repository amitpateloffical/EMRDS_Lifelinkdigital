<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('permission')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });

        DB::table('roles')->insert([
            'name' => 'Administrator',
            'permission' => '["createGeneralInformation","readGeneralInformation","readMedicalCheckUp","updateMedicalCheckUp","readNurshingStaffUpdate","updateNurshingStaffUpdate","readPreEmploymentCheckUpEx.","updatePreEmploymentCheckUpEx.","readOHCHeadReview","updateOHCHeadReview","readHRReview","updateHRReview","readActivityLog","updateActivityLog"]',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
