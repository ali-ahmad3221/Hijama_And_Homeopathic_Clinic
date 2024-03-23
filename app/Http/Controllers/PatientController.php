<?php

namespace App\Http\Controllers;
use App\Models\Admin\Patient;
use App\Models\Admin\State;
use App\Models\Admin\City;
use App\Models\Admin\Country;
use Illuminate\Http\Request;
use yajra\DataTables\DataTables;
use App\Models\Admin\Treatment;
use App\Models\Admin\Equipment;
use App\Models\EquipmentLog;
use Carbon\Carbon;

class PatientController extends Controller
{
    public function patienList(Request $request){
        if ($request->ajax()) {
            $data = Patient::select('*')->orderBy('id','desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<i class="fas fa-ellipsis-h" id="ellipsis" onClick="showButtons('.$row->id.')"></i>
                                  <div id="mybuttons_'.$row->id.'" class="mybuttons">
                                    <a href="' . route('patient.edit', ['patient_id'=>$row->id]) . '" class="edit badge badge-success btn-sm" style="text-decoration:none;">Edit</a>
                                    <a href="' . route('specific.patient.treatments', ['patient_id'=>$row->id]) . '" class="edit badge badge-primary btn-sm" style="text-decoration:none;">Treatments</a>
                                  </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $data['total_cups'] = Patient::sum('cups_qty');
        return view('admin.pages.patients.list', $data);
    }

    public function presentMonthPatienList(Request $request){
        $today = Carbon::today()->toDateString();
        $monthStartDate = Carbon::now()->startOfMonth()->toDateString();
        if ($request->ajax()) {
            $today = Carbon::today()->toDateString();
            $monthStartDate = Carbon::now()->startOfMonth()->toDateString();
            $data = Patient::select('*')->whereBetween('date', [$monthStartDate, $today])->orderBy('id','desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<i class="fas fa-ellipsis-h" id="ellipsis" onClick="showButtons('.$row->id.')"></i>
                                  <div id="mybuttons_'.$row->id.'" class="mybuttons">
                                    <a href="' . route('patient.edit', ['patient_id'=>$row->id]) . '" class="edit badge badge-success btn-sm" style="text-decoration:none;">Edit</a>
                                    <a href="' . route('specific.patient.treatments', ['patient_id'=>$row->id]) . '" class="edit badge badge-primary btn-sm" style="text-decoration:none;">Treatments</a>
                                  </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $data['total_cups'] = Patient::whereBetween('date', [$monthStartDate, $today])->sum('cups_qty');
        return view('admin.pages.patients.list', $data);
    }




    public function addview(Request $request){
        $data['serialNumber'] = Patient::generateSerialNumber();
        $data['states'] = State::where('country_id', 167)->with('cities')->get();
        $data['country'] = Country::where('id', 167)->first();
        return view('admin.pages.patients.add', $data);
    }

    public function submitPatient(Request $request){
        $data['serialNumber'] = Patient::generateSerialNumber();
        $patient = new Patient();
        $patient->country_id = $request->country_id;
        $patient->state_id = $request->state_id;
        $patient->city_id = $request->city_id;
        $patient->address = $request->address;
        $patient->name = $request->patient_name;
        $patient->father_name = $request->father_name;
        $patient->contact_number = $request->mobile;
        $patient->age = $request->patient_age;
        $patient->date = $request->treatment_date;
        $patient->diagnostic = $request->diagnostics;
        $patient->gender = $request->patient_gender;
        $patient->serial_num = $data['serialNumber'];
        $patient->status = 'active';
        $patient->points = $request->hijama_points;
        $patient->medicines = $request->medicines;
        $patient->fee = $request->hijama_fee;
        $patient->cups_qty = $request->points_qty;

        if(!isset($request->hijama_points)){
            $patient->save();
            return redirect()->route('patient.list')->with('success', 'Patient added successfully.');
        }


        // $patient->save();
        if($patient->save()){
            $treatment = new Treatment();
            $treatment->patient_id  =   $patient->id;
            $treatment->points      =   $request->hijama_points;
            $treatment->medicine    =   $request->medicines;
            $treatment->point_qty   =   $request->points_qty;
            $treatment->date        =   $request->hijama_date;
            $treatment->status      =   'active';
            $treatment->fee         =   $patient->fee;

            if($treatment->save()){
                $equipment = Equipment::where('type', 'cups')->first();
                $equipment->stockin  -= $request->points_qty;
                $equipment->stockout += $request->points_qty;
                $equipment->save();
            }
        }
        return redirect()->route('patient.list')->with('success', 'Patient added successfully.');
    }

    public function editPatient(Request $request){
        $data['states'] = State::where('country_id', 167)->with('cities')->get();
        $data['country'] = Country::where('id', 167)->first();
        $mypatient = Patient::where('id', $request->patient_id)->first();
        $data['treatments'] = $mypatient->treatments;
        $data['selected_state_name'] = State::where('id', $mypatient->state_id)->first();
        $data['selected_city_name']  = City::where('id', $mypatient->city_id)->first();
        $data['patient'] = $mypatient;
        $data['serialNumber'] = $mypatient->serial_num;
        return view('admin.pages.patients.edit', $data);

    }

    public function updatePatient(Request $request){
        $patient = Patient::where('id', $request->patient_id)->first();
        $patient->country_id = $request->country_id;
        $patient->state_id = $request->state_id;
        $patient->city_id = $request->city_id;
        $patient->address = $request->address;
        $patient->name = $request->patient_name;
        $patient->father_name = $request->father_name;
        $patient->contact_number = $request->mobile;
        $patient->age = $request->patient_age;
        $patient->date = $request->treatment_date;
        $patient->diagnostic = $request->diagnostics;
        $patient->gender = $request->patient_gender;
        $patient->status = 'active';
        // $patient->serial_num = $request->serial_no;
        // $patient->points = $request->hijama_points;
        // $patient->medicines = $request->medicines;
        // $patient->fee = $request->hijama_fee;
        // $patient->cups_qty = $request->points_qty;
        // $patient->save();

        if(!isset($request->hijama_points)){
            $patient->points = $patient->points;
            $patient->medicines = $patient->medicines;
            $patient->fee = $patient->fee;
            $patient->cups_qty = $patient->cups_qty;
        }

        if(isset($request->hijama_points)){
            
            if(is_null($patient->points)){
                $patient->points   =   $request->hijama_points;
            }

            if(is_null($patient->medicines)){
                $patient->medicines   =   $request->medicines;
            }

            if(is_null($patient->cups_qty)){
                $patient->cups_qty   =   $request->points_qty;
            }

            if(is_null($patient->fee)){
                $patient->fee   =   $request->hijama_fee;
            }
        }

        if($patient->save() && isset($request->hijama_points)){
            // return $request->all();
            $treatment = new Treatment();
            $treatment->patient_id  =   $patient->id;
            $treatment->points      =   $request->hijama_points;
            $treatment->medicine    =   $request->medicines;
            $treatment->point_qty   =   $request->points_qty;
            $treatment->date        =   $request->hijama_date;
            $treatment->status      =   'active';
            $treatment->fee         =   $request->hijama_fee;

            if($treatment->save()){
                $equipment = Equipment::where('type', 'cups')->first();
                $equipment->stockin  -= $request->points_qty;
                $equipment->stockout += $request->points_qty;
                $equipment->save();
            }
        }
        return redirect()->route('patient.list')->with('success', 'Patient updated successfully and new treatment added.');
    }

}
