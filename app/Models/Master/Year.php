<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table        = 'entity__master_years';
    protected $fillable     = [
        'year_id',
        'year_number',
        'year_name',
        'year_desc',
    ];
    protected $primaryKey   = 'year_id';
    public $timestamps      = false;
}
