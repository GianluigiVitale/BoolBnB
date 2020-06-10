<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'apartment_id',
        'package_id',
        'sponsor_end',
    ];

    public function packages()
    {
        return $this->hasMany('App\Package');
    }
}
