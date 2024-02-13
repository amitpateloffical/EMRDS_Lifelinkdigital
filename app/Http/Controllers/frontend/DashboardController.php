<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use App\Models\PreEmployment;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $table = [];
        $datas = PreEmployment::orderByDesc("id")->get();
        foreach ($datas as $data) {
            $data->create = Carbon::parse($data->created_at)->format('d-M-Y h:i A');
            $data->due = Carbon::parse($data->due_date)->format('d-M-Y ');
            $data->dob = Carbon::parse(Admin::dob($data->canditate_id))->format('d-M-Y ');
            array_push($table, [
                "id" => $data->id,
                "parent" => $data->parent ?? "-",
                "record" => $data->record,
                "type" => "Pune, Maharashtra",
                "Due_Date" => $data->due,
                "Candidate_name" => Admin::name($data->canditate_id),
                "DOB" => $data->dob,
                "medical_officer" => Admin::name($data->medical_officer_name),
                "purpose" => $data->purpose,
                "date_open" => $data->create,
                "initiation_date" => $data->initiation_date,
            ]);
        }
        $table  = collect($table)->sortBy('date_open')->reverse()->toArray();
        $datag = json_encode($table);
        return view('frontend.dashboard', compact('datag'));
    }
}
