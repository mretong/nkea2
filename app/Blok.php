<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blok extends Model
{
    protected $table = 'blok';
    protected $primaryKey = 'id';
    protected $fillable = ['fasa_id','lokaliti_id','nama','jum_lot_total','anggaran_kos','pakej_id'];

    public $timestamps = true;

    public function fasa()
    {
    	return $this->belongsTo('App\Fasa','fasa_id','id');
    }

    public function lokaliti()
    {
    	return $this->belongsTo('App\Lokaliti','lokaliti_id','id');
    }

    public function negeri()
    {
        return $this->belongsToMany('App\Negeri');
    }

    public function daerah()
    {
        return $this->belongsToMany('App\Daerah');
    }

    public function mukim()
    {
        return $this->belongsToMany('App\Mukim');
    }
}
