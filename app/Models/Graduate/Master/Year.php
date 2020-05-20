<?php

namespace App\Models\Graduate\Master;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $connection   = 'graduate';
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
