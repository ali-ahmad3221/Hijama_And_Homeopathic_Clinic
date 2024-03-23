<?php

namespace App\Models\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = 'equipments';
}
