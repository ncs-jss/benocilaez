<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $fillable = ['name', 'branch_yr',
        'roll_num', 'phone', 'events'];
    protected $hidden =['created_at', 'updated_at'];
}
