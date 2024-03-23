<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Treatment;

class Patient extends Model
{
    use HasFactory;
    public function treatments(){
        return $this->hasMany(Treatment::class)->orderBy('id', 'desc');
    }

    public static function generateSerialNumber()
    {
       $latestUser = self::orderBy('id', 'desc')->first();
        // dd($latestUser);
        if (!$latestUser) {
            $serialNumber = 'P-01';
        } else {
            $latestSerialNumber = $latestUser->serial_num;
            $latestSerialNumber = intval(substr($latestSerialNumber, 2));
            $latestSerialNumber++;
            $serialNumber = 'P-' . str_pad($latestSerialNumber, 2, '0', STR_PAD_LEFT);
        }

        return $serialNumber;
    }

}
