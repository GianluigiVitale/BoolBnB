<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'number_rooms',
        'number_beds',
        'number_bathrooms',
        'sqmt',
        'latitude',
        'longitude',
        'image'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function sponsorship()
    {
        return $this->belongsTo('App\Sponsorship');
    }

    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

    public function views()
    {
        return $this->hasMany('App\View');
    }
}
