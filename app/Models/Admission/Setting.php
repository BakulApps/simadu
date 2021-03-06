<?php

namespace App\Models\Admission;

use App\Models\Master\Ladder;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table        = 'admission_entity__settings';
    protected $fillable     = [
        'setting_id',
        'setting_app_name',
        'setting_app_subname',
        'setting_app_notify',
        'setting_school_fundation',
        'setting_school_ladder',
        'setting_school_name',
        'setting_school_slug',
        'setting_school_nsm',
        'setting_school_npsn',
        'setting_school_address',
        'setting_school_headmaster_name',
        'setting_school_headmaster_nip',
    ];
    protected $primaryKey   = 'setting_id';
    public $timestamps      = false;

    static function SubNameSchool()
    {
        return Ladder::where('ladder_id', self::value('setting_school_ladder'))->value('ladder_code') . '. ' . self::value('setting_school_name');
    }

    static function FullNameSchool()
    {
        return Ladder::where('ladder_id', self::value('setting_school_ladder'))->value('ladder_name') . ' ' . self::value('setting_school_name');
    }

    static function FullNameApp()
    {
        return self::value('setting_app_name') . ' (' . self::value('setting_app_subname') . ')';
    }
}
