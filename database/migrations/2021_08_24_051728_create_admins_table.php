<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role_id');
            $table->string('reporting_manager')->nullable();
            $table->string('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('mobile')->nullable();
            $table->string('gender')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('department')->nullable();
            $table->string('cv')->nullable();
            $table->string('certification')->nullable();
            $table->string('zone')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('site')->nullable();
            $table->string('building')->nullable();
            $table->string('floor')->nullable();
            $table->string('room')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('healthCard')->nullable();
            $table->string('picture')->nullable();
            $table->string('added_by')->nullable();
            $table->string('comment')->nullable();
            $table->rememberToken();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
        DB::table('admins')->insert([
            'name' => 'EMRDS',
            'email' => 'superadmin@gmail.com',
            'role_id' => 1,
            'password' => Hash::make('admin'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
