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
        Schema::create('audit_trials', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('doc_id')->nullable();
            $table->string('previous')->nullable();
            $table->string('new')->nullable();
            $table->string('origin_state')->nullable();
            $table->string('change_by')->nullable();
            $table->string('user_name')->nullable();
            $table->string('result_state')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_trials');
    }
};
