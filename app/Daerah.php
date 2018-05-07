<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    protected $table = 'daerah';
    protected $primaryKey = 'id';
    protected $fillable = ['negeri_id','nama','kod'];

    public $timestamps = true;

    public function negeri()
    {
    	return $this->belongsTo('App\Negeri','negeri_id','id');
    }

    public function blok()
    {
    	return $this->belongsToMany('App\Blok');
    }
}
