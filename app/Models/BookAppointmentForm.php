<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAppointmentForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_no',
        'area',
        'appointment_date',
        'appointment_time',
        'comment'
    ];
}
