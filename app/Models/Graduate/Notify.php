<?php

namespace App\Models\Graduate;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $table        = 'graduate_entity__notifies';
    protected $fillable     = [
        'notify_id',
        'notify_number',
        'notify_status',
        'notify_value_pg',
        'notify_value_pg_total',
        'notify_value_kt',
        'notify_value_kt_total',
        'notify_view',
        'notify_print',
        'student_id'
    ];
    public $timestamps      = false;
}
