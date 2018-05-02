<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayah';
    protected $primaryKey = 'id';
    protected $fillable = ['daerah_id','nama','kod'];

    public $timestamps = false;

    public function daerah()
    {
    	return $this->belongsTo('App\Daerah','daerah_id','id');
    }
}
