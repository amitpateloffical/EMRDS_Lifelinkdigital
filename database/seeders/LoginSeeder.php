<?php

namespace Database\Seeders;

use Helpers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->insert([
            'name' => 'Amit Guru',
            'email' => 'amitguruhr@lifelinkdigital.com',
            'role_id' => 2,
            'password' => Hash::make('1234567890'),
        ]);
        DB::table('admins')->insert([
            'name' => 'Madhulika Mishra',
            'email' => 'madhulikamishramo@lifelinkdigital.com',
            'role_id' => 3,
            'password' => Hash::make('1234567890'),
        ]);
        DB::table('admins')->insert([
            'name' => 'Amit Patel',
            'email' => 'amitpatelns@lifelinkdigital.com',
            'role_id' => 4,
            'password' => Hash::make('1234567890'),
        ]);
        DB::table('admins')->insert([
            'name' => 'Shaleen Mishra',
            'email' => 'shaleenmishraohc@lifelinkdigital.com',
            'role_id' => 5,
            'password' => Hash::make('1234567890'),
        ]);
// -------------------------------------------------------------------
        DB::table('admins')->insert([
            'name' => 'Rahul Sharma',
            'email' => 'Rahul.Sharma@Serum.com',
            'role_id' => 6,
            'reporting_manager' => '2',
            'dob' => '10-10-1995',
            'age' => '28',
            'mobile'=> '9876543210',
            'gender' => 'Male',
            'civil_status' => 'Married',
            'department' => '1',
            'site' => 'Pune, Maharashtra',
            'password' => Hash::make('1234567890'),

        ]);


        DB::table('admins')->insert([
            'name' => 'Priya Patel',
            'email' => 'priya.patel@Serum.com',
            'role_id' => 6,
            'reporting_manager' => '2',
            'dob' => '10-10-1994',
            'age' => '29',
            'mobile'=> '9876543211',
            'gender' => 'Female',
            'civil_status' => 'Married',
            'department' => '1',
            'site' => 'Pune, Maharashtra',
            'password' => Hash::make('1234567890'),

        ]);

        DB::table('admins')->insert([
            'name' => 'Anjali Desai',
            'email' => 'anjali.desai@Serum.com',
            'role_id' => 6,
            'reporting_manager' => '2',
            'dob' => '10-10-1996',
            'age' => '27',
            'mobile'=> '9876543212',
            'gender' => 'Female',
            'civil_status' => 'Un-Married',
            'department' => '1',
            'site' => 'Pune, Maharashtra',
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('admins')->insert([
            'name' => 'Rajesh Kumar',
            'email' => 'rajesh.kumar@Serum.com',
            'role_id' => 6,
            'reporting_manager' => '2',
            'dob' => '10-10-1997',
            'age' => '26',
            'mobile'=> '9876543213',
            'gender' => 'Male',
            'civil_status' => 'Un-Married',
            'department' => '1',
            'site' => 'Pune, Maharashtra',
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('admins')->insert([
            'name' => 'Pooja Mehta',
            'email' => 'pooja.mehta@Serum.com',
            'role_id' => 6,
            'reporting_manager' => '2',
            'dob' => '10-10-1998',
            'age' => '25',
            'mobile'=> '9876543214',
            'gender' => 'Female',
            'civil_status' => 'Un-Married',
            'department' => '1',
            'site' => 'Pune, Maharashtra',
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('admins')->insert([
            'name' => 'Sanjay Verma',
            'email' => 'sanjay.verma@Serum.com',
            'role_id' => 7,
            'reporting_manager' => '2',
            'dob' => '10-10-1995',
            'age' => '28',
            'mobile'=> '9876543215',
            'gender' => 'Male',
            'civil_status' => 'Married',
            'department' => '2',
            'site' => 'Pune, Maharashtra',
            'password' => Hash::make('1234567890'),

        ]);

        DB::table('admins')->insert([
            'name' => 'Sneha Reddy',
            'email' => 'sneha.reddy@Serum.com',
            'role_id' => 7,
            'reporting_manager' => '2',
            'dob' => '10-10-1999',
            'age' => '24',
            'mobile'=> '9876543216',
            'gender' => 'Female',
            'civil_status' => 'Married',
            'department' => '2',
            'site' => 'Pune, Maharashtra',
            'password' => Hash::make('1234567890'),

        ]);

        DB::table('admins')->insert([
            'name' => 'Ravi Singh',
            'email' => 'ravi.singh@Serum.com',
            'role_id' => 7,
            'reporting_manager' => '2',
            'dob' => '10-10-2000',
            'age' => '23',
            'mobile'=> '9876543217',
            'gender' => 'Male',
            'civil_status' => 'Married',
            'department' => '2',
            'site' => 'Pune, Maharashtra',
            'password' => Hash::make('1234567890'),

        ]);

        DB::table('admins')->insert([
            'name' => 'Aarti Gupta',
            'email' => 'aarti.gupta@Serum.com',
            'role_id' => 7,
            'reporting_manager' => '2',
            'dob' => '10-10-2000',
            'age' => '23',
            'mobile'=> '9876543218',
            'gender' => 'Female',
            'civil_status' => 'Married',
            'department' => '2',
            'site' => 'Pune, Maharashtra',
            'password' => Hash::make('1234567890'),

        ]);

        DB::table('admins')->insert([
            'name' => 'Karishma Bhatia',
            'email' => 'karishma.bhatia@Serum.com',
            'role_id' => 7,
            'reporting_manager' => '2',
            'dob' => '10-10-2000',
            'age' => '23',
            'mobile'=> '9876543219',
            'gender' => 'Female',
            'civil_status' => 'Married',
            'department' => '2',
            'site' => 'Pune, Maharashtra',
            'password' => Hash::make('1234567890'),

        ]);

        // --------------------------------------------------
// ------------------------------Department--------------------
            DB::table('departments')->insert([
                'name' => 'Quality Assurance',
                'dc' => 'QA'
            ]);

            DB::table('departments')->insert([
                'name' => 'Production',
                'dc' => 'Production'
            ]);

// -------------------------------------------
        DB::table('employee_information')->insert([
            'employee_id' => 2
        ]);
        DB::table('employee_information')->insert([
            'employee_id' => 3
        ]);
        DB::table('employee_information')->insert([
            'employee_id' => 4
        ]);
        DB::table('employee_information')->insert([
            'employee_id' => 5
        ]);




        DB::table('roles')->insert([
            'name' => 'HR',
            'permission' => '["createGeneralInformation","readGeneralInformation","readMedicalCheckUp","updateMedicalCheckUp","readNurshingStaffUpdate","updateNurshingStaffUpdate","readPreEmploymentCheckUpEx.","updatePreEmploymentCheckUpEx.","readOHCHeadReview","updateOHCHeadReview","readHRReview","updateHRReview","readActivityLog","updateActivityLog"]',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => 'Medical Officer',
            'permission' => '["createGeneralInformation","readGeneralInformation","readMedicalCheckUp","updateMedicalCheckUp","readNurshingStaffUpdate","updateNurshingStaffUpdate","readPreEmploymentCheckUpEx.","updatePreEmploymentCheckUpEx.","readOHCHeadReview","updateOHCHeadReview","readHRReview","updateHRReview","readActivityLog","updateActivityLog"]',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => 'Nurshing Staff',
            'permission' => '["createGeneralInformation","readGeneralInformation","readMedicalCheckUp","updateMedicalCheckUp","readNurshingStaffUpdate","updateNurshingStaffUpdate","readPreEmploymentCheckUpEx.","updatePreEmploymentCheckUpEx.","readOHCHeadReview","updateOHCHeadReview","readHRReview","updateHRReview","readActivityLog","updateActivityLog"]',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => 'OHC Head',
            'permission' => '["createGeneralInformation","readGeneralInformation","readMedicalCheckUp","updateMedicalCheckUp","readNurshingStaffUpdate","updateNurshingStaffUpdate","readPreEmploymentCheckUpEx.","updatePreEmploymentCheckUpEx.","readOHCHeadReview","updateOHCHeadReview","readHRReview","updateHRReview","readActivityLog","updateActivityLog"]',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'Production Manager',
            'permission' => '["createGeneralInformation","readGeneralInformation","readMedicalCheckUp","updateMedicalCheckUp","readNurshingStaffUpdate","updateNurshingStaffUpdate","readPreEmploymentCheckUpEx.","updatePreEmploymentCheckUpEx.","readOHCHeadReview","updateOHCHeadReview","readHRReview","updateHRReview","readActivityLog","updateActivityLog"]',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'Officer-QA',
            'permission' => '["createGeneralInformation","readGeneralInformation","readMedicalCheckUp","updateMedicalCheckUp","readNurshingStaffUpdate","updateNurshingStaffUpdate","readPreEmploymentCheckUpEx.","updatePreEmploymentCheckUpEx.","readOHCHeadReview","updateOHCHeadReview","readHRReview","updateHRReview","readActivityLog","updateActivityLog"]',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}