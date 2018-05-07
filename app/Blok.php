<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blok extends Model
{
    protected $table = 'blok';
    protected $primaryKey = 'id';
    protected $fillable = ['fasa_id','lokaliti_id','nama','jum_lot_total','anggaran_kos'];

    public $timestamps = true;

    public function fasa()
    {
    	return $this->hasOne('App\Fasa','fasa_id','id');
    }

    public function lokaliti()
    {
    	return $this->belongsToMany('App\Lokaliti');
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
