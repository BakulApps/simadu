<?php

namespace App\Models\Graduate;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $connection   = 'graduate';
    protected $table        = 'entity__notifies';
    protected $fillable     = [
        'notify_id',
        'notify_number',
        'notify_status',
        'notify_value',
        'notify_value_total',
        'notify_view',
        'notify_print',
        'student_id'
    ];
    public $timestamps      = false;
}
