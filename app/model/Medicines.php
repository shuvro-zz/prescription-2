<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Medicines extends Model
{
    protected $table='medicine';
    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo('App\model\Brands','brand_id');
    }
}
