<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokaliti extends Model
{
    protected $table = 'lokaliti';
    protected $primaryKey = 'id';
    protected $fillable = ['wilayah_id','nama','kod'];

    public $timestamps = true;

    public function wilayah()
    {
    	return $this->belongsTo('App\Wilayah','wilayah_id','id');
    }

    public function blok()
    {
    	return $this->belongsToMany('App\Blok');
    }
}
