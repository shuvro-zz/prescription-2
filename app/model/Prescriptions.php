<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Prescriptions extends Model
{
    protected $table='prescription';
//    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo('App\model\Clients','client_id');
    }
    public function doctor()
    {
        return $this->belongsTo('App\model\Doctors','doctor_id');
    }

    public function known_case_list()
    {
        return $this->hasMany('App\model\Known_case_lists','prescription_id');
    }

    public function Test_lists()
    {
        return $this->hasMany('App\model\Test_lists','prescription_id');
    }

    public function medicini_list()
    {
        return $this->hasMany('App\model\Medicine_lists','prescription_id');
    }
    public function note_list()
    {
        return $this->hasMany('App\model\Note_lists','prescription_id');
    }
}
