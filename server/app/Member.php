<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    public $timestamps = false;

    /**
     * Get the society that owns the event.
     */
    public function society()
    {
        return $this->belongsTo('App\Society', 'society_id');
    }
    public function branch()
    {
        return $this->belongsTo('App\Branch', 'branch_id');
    }
    public function memberType()
    {
        return $this->belongsTo('App\MemberType', 'member_type_id')->orderBy('name');
    }
}
