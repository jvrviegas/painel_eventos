<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    protected $fillable = [

    ];

    public function subscriptions(){
        return $this->hasMany(EventSubscription::class);
    }
}
