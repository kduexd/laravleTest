<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    //
    public $timestamps = false;
    protected $table = 'member';
    protected $fillable = [
        'Account', 'Password'
    ];
    public function setPasswordAttribute($password)
    {
        $this->attributes['Password'] = md5($password);
    }
}
