<?php

namespace App\Models\Graduate;

use Illuminate\Foundation\Auth\User as Authenticated;
use Illuminate\Notifications\Notifiable;

class User extends Authenticated
{
    use Notifiable;

    protected $connection   = 'graduate';
    protected $table        = 'entity__users';
    protected $fillable     = [
        'user_id',
        'user_name',
        'user_pass',
        'user_fullname',
        'user_role',
        'remember_token',
    ];
    protected $hidden = ['user_pass', 'remember_token'];
    protected $primaryKey   = 'user_id';

    public function getAuthPassword()
    {
        return $this->user_pass;
    }
}
