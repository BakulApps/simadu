<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Ladder extends Model
{
    protected $table        = 'entity__master_ladders';
    protected $fillable     = [
        'ladder_id',
        'ladder_code',
        'ladder_name',
        'ladder_desc',
    ];
    public $timestamps      = false;
}
