<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Treatment;
use yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function patientTreatments(Request $request){
        $data['patient_id'] =  $request->patient_id;
        $data['treatments'] = Treatment::where('patient_id', $request->patient_id)->get();
        $data['patient_fee'] = Treatment::where('patient_id', $request->patient_id)->sum('fee');
        return view('admin.pages.patients.treatements-list', $data);
    }

    public function editTreatment(Request $request){
        $data['treatment'] = Treatment::where('id', $request->treatment_id)->first();
        $data['treatment_id'] = $request->treatment_id;
        return view('admin.pages.treatments.edit', $data);
    }

    public function updateTreatment(Request $request){

        $treatment = Treatment::where('id', $request->treatement_id)->first();
        $treatment->points = $request->hijama_points;
        $treatment->medicine = $request->medicines;
        $treatment->point_qty = $request->points_qty;
        $treatment->date = $request->hijama_date;
        $treatment->fee = $request->hijama_fee;
        $treatment->save();
        return redirect()->route('patient.list')->with('success', 'your treatment has been updated');
    }

    public function viewTreatment(Request $request){
        $data['patient_id'] = $request->patient_id;
        $data['treatment'] = Treatment::where('id', $request->treatment_id)->first();
        $data['treatment_id'] = $request->treatment_id;
        return view('admin.pages.treatments.view', $data);
    }
}
