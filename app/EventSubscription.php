<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EventSubscription extends Model
{
    protected $fillable = [

    ];

    public function professional(){
        return $this->belongsTo('App\CorenInscrito');
    }

    public function event(){
        return $this->belongsTo('App\Event');
    }
}
