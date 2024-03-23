<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Equipment;
use yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\EquipmentLog;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function equipmentList(Request $request){
        if ($request->ajax()) {
            $data = Equipment::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<i class="fas fa-ellipsis-h" id="ellipsis" onClick="showButtons('.$row->id.')"></i>
                                    <div id="mybuttons_'.$row->id.'" class="mybuttons">
                                        <a href="'.route('edit.equipment', ['equipment_id'=>$row->id]) . '" class="edit badge badge-success btn-sm mr-1" style="text-decoration:none;">Edit</a>
                                        <a href="'.route('view.equipment', ['equipment_id'=>$row->id]) . '" class="edit badge badge-primary btn-sm" style="text-decoration:none;">View</a>
                                        <a href="'.route('equipment.logs', ['equipment_id'=>$row->id]) . '" class="edit badge badge-secondary btn-sm" style="text-decoration:none;">Logs</a>
                                        <a href="'.route('equipment.avail.stock', ['equipment_id'=>$row->id]) . '" class="edit badge badge-secondary btn-sm" style="text-decoration:none;">Avail</a>
                                        <a href="'.route('edit.just.equipment', ['equipment_id'=>$row->id]) . '" class="edit badge badge-secondary btn-sm" style="text-decoration:none;">Edit Equipment</a>
                                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.equipments.list');
    }

    public function addEquipment(Request $request){
        return view('admin.pages.equipments.add');
    }

    public function submitEquipment(Request $request){
        $equipment =new Equipment();
        $equipment->name = $request->quip_name;
        $equipment->total_qty = $request->equip_qty;
        $equipment->stockin = $request->equip_qty - 0;
        $equipment->purchase_price = $request->purchase_price;
        $equipment->sale_price = $request->sale_price;

        if($request->hasFile('img'))
        {
            $id_img = $request->file('img');
            $ext   = $id_img->extension();
            $img_name = rand().'.'.$ext;
            $request->img->move('public/equipments/images/', $img_name);
            $equipment->image = $img_name;
        }
        $equipment->date = $request->equip_add_date;
        $equipment->status = 'instock';
        $equipment->type   = $request->equpment_type?$request->equpment_type:'others';
        if( $equipment->save()){
            $equip_log = new EquipmentLog();
            $equip_log->equipment_id   =  $equipment->id;
            $equip_log->name           =  $equipment->name;
            $equip_log->total_qty      =  $equipment->total_qty;
            $equip_log->stockin        =  $equipment->stockin;
            $equip_log->stockout       =  $equipment->stockout;
            $equip_log->purchase_price =  $equipment->purchase_price;
            $equip_log->sale_price     =  $equipment->sale_price;
            $equip_log->save();
        }
        return redirect()->route('equipments.list')->with('success','New equipment added successfully.');
    }

    public function editEquipment(Request $request){
        $data['equipment'] = Equipment::where('id', $request->equipment_id  )->first();
        return view('admin.pages.equipments.edit', $data);
    }

    public function updateEquipment(Request $request){
        $equipment = Equipment::where('id',$request->equipment_id)->first();
        $equipment->name = $request->quip_name;
        $equipment->total_qty += $request->equip_qty;
        $equipment->stockin += $request->equip_qty;
        $equipment->purchase_price = $request->purchase_price;
        $equipment->sale_price = $request->sale_price;

        if ($request->hasFile('img')) {
            $file_name = $equipment->getRawOriginal('image');
            $destination = public_path('/equipments/images/'. $file_name);
            if (File::exists($destination)) {
                unlink($destination);
            }

            $image = $request->file('img');
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . '.' . $ext;
            $image->move(public_path('equipments/images/'), $image_name);
            $equipment->image = $image_name;
        }

        $equipment->date = $request->equip_add_date;
        $equipment->status = 'instock';
        $equipment->type   = $request->equpment_type?$request->equpment_type:'others';

        if( $equipment->save()){
            $equip_log = new EquipmentLog();
            $equip_log->equipment_id   =  $equipment->id;
            $equip_log->name           =  $equipment->name;
            $equip_log->total_qty      =  $equipment->total_qty;
            $equip_log->stockin        =  $equipment->stockin;
            $equip_log->stockout       =  $equipment->stockout;
            $equip_log->purchase_price =  $equipment->purchase_price;
            $equip_log->sale_price     =  $equipment->sale_price;
            $equip_log->save();
        }
        return redirect()->route('equipments.list')->with('success','Equipment updated successfully.');
    }

    public function viewEquipment(Request $request){
        $data['equipment'] = Equipment::where('id', $request->equipment_id  )->first();
        return view('admin.pages.equipments.view', $data);
    }

    public function outEquipment(Request $request){
        if ($request->ajax()) {
            $data = Equipment::select('*')->onlyTrashed();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('equipment.restore', ['equipment_id'=>$row->id]) . '" class="edit badge badge-success btn-sm mr-1" style="text-decoration:none;">Restore</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.equipments.outstock-equipments');
    }

    public function availableEquipment(Request $request){
        if ($request->ajax()) {
            $data = Equipment::select('*')->where('status','instock');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('equipment.out.stock', ['equipment_id'=>$row->id]) . '" class="edit badge badge-danger btn-sm mr-1" style="text-decoration:none;">Out Stock</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.equipments.available-equipments');
    }

    public function outStockEquipment(Request $request){
        $equipment = Equipment::where('id', $request->equipment_id)->first();
        $equipment->delete();
        $equipment->status = 'outstock';
        $equipment->update();
        return redirect()->back()->with('success', 'Your equipment stock is out temprarily.');
    }


    public function restoreEquipment(Request $request){
        $equipment = Equipment::where('id', $request->equipment_id)->onlyTrashed()->first();
        if($equipment){
            $equipment->restore();
            $equipment->status = 'instock';
            $equipment->update();
            return redirect()->back()->with('success', 'Your equipment is restored successfully.');
        }
        return redirect()->back()->with('danger', 'record not fount');
    }


    public function availEquipment(Request $request){
        $equipment = Equipment::where('id', $request->equipment_id)->first();
        $equipment->status = 'instock';
        $equipment->update();
        return redirect()->back();
    }



    public function equipmentLogs(Request $request){
        $data['treatments'] = EquipmentLog::where('equipment_id', $request->equipment_id)->get();
        $data['treatment_name'] = Equipment::where('id', $request->equipment_id)->first()->name;
        return view('admin.pages.equipments.logs', $data);
    }


    public function editJustEquipment(Request $request){
        $data['equipment'] = Equipment::where('id', $request->equipment_id  )->first();
        return view('admin.pages.equipments.edit-just-equipment', $data);
    }


    public function updateJustEquipment(Request $request){
        $equipment = Equipment::where('id',$request->equipment_id)->first();
        $equipment->name = $request->quip_name;
        $equipment->total_qty += $request->equip_qty;
        $equipment->stockin += $request->equip_qty;
        $equipment->purchase_price = $request->purchase_price;
        $equipment->sale_price = $request->sale_price;

        if ($request->hasFile('img')) {
            $file_name = $equipment->getRawOriginal('image');
            $destination = public_path('/equipments/images/'. $file_name);
            if (File::exists($destination)) {
                unlink($destination);
            }

            $image = $request->file('img');
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . '.' . $ext;
            $image->move(public_path('equipments/images/'), $image_name);
            $equipment->image = $image_name;
            // $equipment->save();
        }

        $equipment->date = $request->equip_add_date;
        $equipment->status = 'instock';
        $equipment->save();

        $notification = array(
            'message' => 'Equipment updated successfully.!',
            'alert-type' => 'success'
        );

        // return redirect('/admin/employeemaintenance/show')
        //             ->with( $notification, 'Employee Information Created');
        return redirect()->route('equipments.list')->with($notification, 'Equipment updated successfully.');
    }

}
