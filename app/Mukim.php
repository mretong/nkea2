<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mukim extends Model
{
    protected $table = 'mukim';
    protected $primaryKey = 'id';
    protected $fillable = ['daerah_id','wilayah_id','nama'];

    public $timestamps = true;

    public function daerah()
    {
    	return $this->belongsTo('App\Daerah','daerah_id','id');
    }

    public function wilayah()
    {
    	return $this->belongsTo('App\Wilayah','wilayah_id','id');
    }

    public function blok()
    {
        return $this->belongsToMany('App\Blok');
    }
}
