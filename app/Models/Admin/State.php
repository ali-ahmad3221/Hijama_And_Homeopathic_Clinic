<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public function cities(){
        return $this->hasMany(City::class);
    }

    public function countries(){
        return $this->hasMany(Country::class, 'id','country_id');
    }
}
