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
        Schema::create('stage_histories', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('doc_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('stage_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stage_histories');
    }
};
