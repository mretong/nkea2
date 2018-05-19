<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $table = 'lot';
    protected $primaryKey = 'id';
    protected $fillable = ['mukim_id','no_lot','status_milik_id','no_hakmilik','blok_id'];

    public $timestamps = true;

    public function mukim()
    {
    	return $this->belongsTo('App\Mukim','mukim_id','id');
    }

    public function blok()
    {
    	return $this->belongsTo('App\Blok','blok_id','id');
    }

    public function pakej()
    {
    	return $this->belongsTo('App\Pakej','pakej_id','id');
    }

    public function status()
    {
        return $this->belongsTo('App\StatusMilik','status_milik_id','id');
    }
}
