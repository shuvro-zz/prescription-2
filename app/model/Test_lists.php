<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Test_lists extends Model
{
    protected $table = 'test_list';
    public function hasTest()
    {
        return $this->belongsTo('App\model\TestNote','test_id');
    }
}
