<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Clients extends Model
{
    protected $table = 'client';
    
    public function prescription()
    {
        return $this->hasMany('App\model\Prescriptions','client_id');
    }
}
