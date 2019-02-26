<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public $timestamps = false;
    protected $table = 'branch';
    
    public function members()
    {
        return $this->hasMany('App\Member', 'branch_id');
    }
}
