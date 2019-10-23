<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EventSubscription extends Model
{
    protected $fillable = [

    ];

    public function professional(){
        return $this->belongsTo(CorenInscrito::class);
    }

    public function event(){
        return $this->belongsTo(Event::class);
    }
}
