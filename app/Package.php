<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'sponsorship_cost',
        'sponsorship_duration'
    ];

    public function sponsorship()
    {
        return $this->belongsTo('App\Sponsorship');
    }
}
