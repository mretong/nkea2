<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warta extends Model
{
    protected $table = 'warta';
    protected $primaryKey = 'id';
    protected $fillable = ['blok_id','tarikh_warta','tarikh_luput','jilid_warta','no_warta','rujukan','catatan'];

    public $timestamps = true;

    public function blok()
    {
    	return $this->hasMany('App\Blok','blok_id','id');
    }
}
