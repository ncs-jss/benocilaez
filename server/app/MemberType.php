<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberType extends Model
{
    protected $table = 'member_type';
    public $timestamps = false;
    public function members()
    {
        return $this->hasMany('App\Member', 'member_type_id');
    }
}
