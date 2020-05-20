<?php

namespace App\Models\Graduate;

use Illuminate\Database\Eloquent\Model;

class Ladder extends Model
{
    protected $connection   = 'graduate';
    protected $table        = 'entity__master_ladders';
    protected $fillable     = [
        'ladder_id',
        'ladder_code',
        'ladder_name',
        'ladder_desc',
    ];
    public $timestamps      = false;
}
