<?php

namespace App\Observers;

use App\Models\Admin\Patient;
use App\Models\Admin\Treatment;

class PatientObserver
{
    /**
     * Handle the Patient "created" event.
     *
     * @param  \App\Models\Admin\Patient  $patient
     * @return void
     */
    public function created(Patient $patient)
    {
        $treatment = new Treatment();
        $treatment->patient_id  =   $patient->id;
        $treatment->points      =   $patient->points;
        $treatment->medicine    =   $patient->medicines;
        $treatment->point_qty   =   $patient->cups_qty;
        $treatment->date        =   $patient->date;
        $treatment->status      =   $patient->status;
        $treatment->fee         =   $patient->fee;
        $treatment->save();
    }

    /**
     * Handle the Patient "updated" event.
     *
     * @param  \App\Models\Admin\Patient  $patient
     * @return void
     */
    public function updated(Patient $patient)
    {
        //
    }

    /**
     * Handle the Patient "deleted" event.
     *
     * @param  \App\Models\Admin\Patient  $patient
     * @return void
     */
    public function deleted(Patient $patient)
    {
        //
    }

    /**
     * Handle the Patient "restored" event.
     *
     * @param  \App\Models\Admin\Patient  $patient
     * @return void
     */
    public function restored(Patient $patient)
    {
        //
    }

    /**
     * Handle the Patient "force deleted" event.
     *
     * @param  \App\Models\Admin\Patient  $patient
     * @return void
     */
    public function forceDeleted(Patient $patient)
    {
        //
    }
}
