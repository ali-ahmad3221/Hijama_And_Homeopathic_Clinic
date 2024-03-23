<?php

namespace App\Http\Controllers;

use App\Models\Admin\Treatment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function patientIncome(Request $request){

        if(!isset($request->startdate) && isset($request->enddate)){
            return redirect()->back()->with('error', 'please select both dates');
        }

        if(isset($request->startdate) && !isset($request->enddate)){
            return redirect()->back()->with('error', 'please select both dates');
        }

        if(isset($request->startdate) && isset($request->enddate)){
            $data['treatments'] = Treatment::whereBetween('date', [$request->startdate, $request->enddate])->with('patient')->get();
            $data['patient_fee_sum'] = Treatment::WhereBetween('date', [$request->startdate, $request->enddate])->sum('fee');
            return view('admin.pages.income.list', $data);
        }
        else{
            $data['treatments'] = Treatment::with('patient')->get();
            $data['patient_fee_sum'] = Treatment::sum('fee');
            return view('admin.pages.income.list', $data);
        }
    }

    public function thisMonthIncome(Request $request){
        $today = Carbon::today()->toDateString();
        $monthStartDate = Carbon::now()->startOfMonth()->toDateString();
        $data['treatments'] = Treatment::whereBetween('date', [$monthStartDate, $today])->get();
        $data['patient_fee_sum'] = Treatment::WhereBetween('date', [$monthStartDate, $today])->sum('fee');
        return view('admin.pages.income.list', $data);
    }

    public function todayIncome(Request $request){
        $today_now = Carbon::now(); // Current date and time
        $dayStart = $today_now->copy()->startOfDay(); // Start of the current day
        $data['treatments'] = Treatment::whereBetween('created_at', [$dayStart, $today_now])->get();
        $data['patient_fee_sum'] = Treatment::WhereBetween('created_at', [$dayStart, $today_now])->sum('fee');
        return view('admin.pages.income.list', $data);
    }
}
