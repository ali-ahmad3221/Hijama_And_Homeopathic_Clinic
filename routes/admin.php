<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Models\Admin\Patient;
use App\Models\Admin\Medicine;
use App\Models\Admin\Equipment;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    if(!auth()->user()){
        return redirect()->route('user.login');
    }
    else {
        $data['patients']   = Patient::count();
        $data['medicines']  = Medicine::count();
        $data['equipments'] = Equipment::count();
        $data['income']     = 22;
        return view('welcome', $data);
    }
})->name('dashboard.view');


Route::controller(App\Http\Controllers\Admin\AdminController::class)->group(function () {
    Route::get('login', 'loginUser')->name('user.login');
    Route::post('login-insert', 'loginUserSubmit')->name('login.submit');
    // Route::get('signup', 'signupUser')->name('user.register');
    // Route::post('register', 'registerUser')->name('register.submit');
});

Route::controller(App\Http\Controllers\Admin\AdminController::class)->group(function () {
    Route::get('dashboard','adminDashboard')->name('admin.dashboard');
    Route::get('profile','Profile')->name('admin.profile');
    Route::get('logout','logout')->name('user.logout');
});

Route::controller(App\Http\Controllers\PatientController::class)->group(function () {
    Route::get('list','patienList')->name('patient.list');
    Route::get('this-month-patients','presentMonthPatienList')->name('present.month.patient.list');
    Route::get('add','addview')->name('patient.view');
    Route::post('submit','submitPatient')->name('patient.submit');
    Route::get('edit','editPatient')->name('patient.edit');
    Route::post('update','updatePatient')->name('patient.update');
});

Route::controller(App\Http\Controllers\IncomeController::class)->group(function () {
    Route::get('patient-income','patientIncome')->name('patients.income');
    Route::get('this-month-income','thisMonthIncome')->name('this.month.income');
    Route::get('today-income','todayIncome')->name('my.today.income');
});

Route::controller(App\Http\Controllers\Admin\MedicineController::class)->group(function () {
    Route::get('medicine-list','medicineList')->name('medicine.list');
    Route::get('available-medicine-list','availableMedicineList')->name('available.medicine.list');
    Route::get('outstock-medicine-list','outStockMedicineList')->name('out.medicine.list');
    Route::get('add-medicine','addMedicine')->name('add.medicine');
    Route::Post('submit-medicine','submitMedicine')->name('medicine.submit');
    Route::get('edit-medicine','editMedicine')->name('medicine.edit');
    Route::post('update-medicine','updateMedicine')->name('medicine.update');
    Route::get('view-medicine','viewMedicine')->name('medicine.view');
    Route::get('outstock-medicine','outStockMedicine')->name('medicine.out.stock');
    Route::get('restore-medicine','restoreMedicine')->name('medicine.restore');
    Route::get('available-medicine','availableMedicine')->name('medicine.available');
});

Route::controller(App\Http\Controllers\Admin\TreatmentController::class)->group(function () {
    Route::get('treatments','patientTreatments')->name('specific.patient.treatments');
    Route::get('edit-treatment','editTreatment')->name('edit.treatment');
    Route::post('update-treatement','updateTreatment')->name('update.treatment');
    Route::get('view-treatment','viewTreatment')->name('view.treatment');
});

Route::controller(App\Http\Controllers\Admin\EquipmentController::class)->group(function () {
    Route::get('equipments','equipmentList')->name('equipments.list');
    Route::get('equipment/add','addEquipment')->name('add.equipment');
    Route::post('equipment/submit','submitEquipment')->name('submit.equipment');
    Route::get('equipment/edit','editEquipment')->name('edit.equipment');
    Route::post('equipment/update','updateEquipment')->name('update.equipment');
    Route::get('equipment/edit-equipment','editJustEquipment')->name('edit.just.equipment');
    Route::post('equipment/update-equipment','updateJustEquipment')->name('update.just.equipment');
    Route::get('equipment/view','viewEquipment')->name('view.equipment');
    Route::get('equipment/outstock','outEquipment')->name('out.equipment');
    Route::get('equipment/available','availableEquipment')->name('available.equipment');
    Route::get('restore-equipments','restoreEquipment')->name('equipment.restore');
    Route::get('equipments/outstock','outStockEquipment')->name('equipment.out.stock');
    Route::get('equipments/avail','availEquipment')->name('equipment.avail.stock');
    Route::get('equipments/logs','equipmentLogs')->name('equipment.logs');
});

Route::controller(App\Http\Controllers\CartController::class)->group(function () {
    Route::get('pharmacy', 'pharmacyHome')->name('pharmacy.home');
    Route::get('getcart', 'GetCarts')->name('get.cart');
    Route::get('deletecart', 'DeleteCart')->name('delete.cart');
    Route::get('products-search', 'Searching')->name('searching.product');
    Route::post('createcart', 'CreateCart')->name('create.cart');
    Route::post('change-qty', 'UpdateQty')->name('update.qty');
});


 // product transaction routes
 Route::group(['prefix'=>'transaction'], function(){
    Route::post('transaction', [TransactionController::class, 'Transaction'])->name('transactions.store');
    Route::get('show-transaction', [TransactionController::class, 'ShowTransaction'])->name('transactions.show');
    Route::get('transaction-index', [TransactionController::class, 'IndexTransaction'])->name('transactions.index');
    Route::get('print-struck', [TransactionController::class, 'PrintStruck'])->name('transactions.print_struck');
    Route::get('transaction-destroy', [TransactionController::class, 'TransactionsDestroy'])->name('transactions.destroy');
    Route::post('submit-remaining-price', [TransactionController::class, 'SubmitRemainingPrice'])->name('submit.remaining.price.in.transations');
});








