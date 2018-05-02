<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $table = 'lot';
    protected $primaryKey = 'id';
    protected $fillable = ['mukim_id','no_lot','status_tanah','no_hakmilik','blok_id','pakej_id'];

    public $timestamps = false;

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
}
