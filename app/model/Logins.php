<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Logins extends Model
{
    public $table = 'login';

    public function reg()
    {
        return $this->belongsTo('App\model\Registration', 'reg_id');
    }
}
