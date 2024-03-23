<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Patient;

class Treatment extends Model
{
    use HasFactory;

    public function patient(){
        return $this->hasOne(Patient::class,'id', 'patient_id');
    }
}
