<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Medicine;
use App\Http\Controllers\Controller;
use yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function medicineList(Request $request){
        if ($request->ajax()) {
            $data = Medicine::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<i class="fas fa-ellipsis-h" id="ellipsis" onClick="showButtons('.$row->id.')"></i>
                                    <div id="mybuttons_'.$row->id.'" class="mybuttons">
                                        <a href="'.route('medicine.edit', ['medicine_id'=>$row->id]) . '" class="edit badge badge-success btn-sm mr-1" style="text-decoration:none;">Edit</a>
                                        <a href="'.route('medicine.available', ['medicine_id'=>$row->id]) . '" class="edit badge badge-secondary btn-sm" style="text-decoration:none;">Avail</a>
                                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.medicines.list');
    }

    //below line is for medicine listing view
        // <a href="'.route('medicine.view', ['medicine_id'=>$row->id]) . '" class="edit badge badge-primary btn-sm" style="text-decoration:none;">View</a>

    public function submitMedicine(Request $request){
        $medicine = new Medicine();
        $medicine->name = $request->name;
        // $medicine->description = $request->description;
        // $medicine->diagnostic = $request->diagnostic;
        // $medicine->cause = $request->cause;
        
        $medicine->purchase_price = $request->purchase_price;
        $medicine->save();
        return redirect()->route('medicine.list')->with('success', 'New madicine added successfully.');
    }

    public function editMedicine(Request $request){
        $data['medicine'] = Medicine::where('id', $request->medicine_id)->first();
        return view('admin.pages.medicines.edit', $data);
    }

    public function updateMedicine(Request $request){
        $medicine = Medicine::where('id', $request->treatement_id)->first();
        $medicine->name = $request->name;
        // $medicine->description = $request->description;
        // $medicine->diagnostic = $request->diagnostic;
        // $medicine->cause = $request->cause;
        $medicine->purchase_price = $request->purchase_price;
        $medicine->save();
        return redirect()->route('medicine.list')->with('success', 'Madicine updated successfully.');
    }

    public function viewMedicine(Request $request){
        $data['medicine'] = Medicine::where('id', $request->medicine_id)->first();
        return view('admin.pages.medicines.view', $data);
    }


    public function availableMedicineList(Request $request){
        if ($request->ajax()) {
            $data = Medicine::select('*')->where('status','instock');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('medicine.out.stock', ['medicine_id'=>$row->id]) . '" class="edit badge badge-danger btn-sm mr-1" style="text-decoration:none;">Out Stock</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.medicines.available-medicine');
    }


    public function outStockMedicineList(Request $request){
        if ($request->ajax()) {
            $data = Medicine::select('*')->onlyTrashed();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('medicine.restore', ['medicine_id'=>$row->id]) . '" class="edit badge badge-success btn-sm mr-1" style="text-decoration:none;">Restore</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.medicines.outstock-medicine');
    }


    public function outStockMedicine(Request $request){
        $medicine = Medicine::where('id', $request->medicine_id)->first();
        $medicine->delete();
        $medicine->status = 'outstock';
        $medicine->update();
        return redirect()->back()->with('success', 'Your medicine stock is out temprarily.');
    }

    public function restoreMedicine(Request $request){
        $medicine = Medicine::where('id', $request->medicine_id)->onlyTrashed()->first();
        if($medicine){
            $medicine->restore();
            $medicine->status = 'instock';
            $medicine->update();
            return redirect()->back()->with('success', 'Your medicine is restored successfully.');
        }
        return redirect()->back()->with('danger', 'record not fount');
    }

    public function availableMedicine(Request $request){
        $medicine = Medicine::where('id', $request->medicine_id)->first();
        $medicine->status = 'instock';
        $medicine->update();
        return redirect()->back();
    }

}
