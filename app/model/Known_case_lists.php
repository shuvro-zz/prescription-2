<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Known_case_lists extends Model
{
    protected $table = 'known_case_list';

    public function hasknownCase()
    {
        return $this->belongsTo('App\model\Note','known_case_id');
    }
}
