<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Medicine_lists extends Model
{
    protected $table = 'medicine_list';

    public function medicine()
    {
        return $this->belongsTo('App\model\Medicines','medicine_id');
    }
}
