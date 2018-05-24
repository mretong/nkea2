<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warta extends Model
{
    protected $table = 'warta';
    protected $primaryKey = 'id';
    protected $fillable = ['blok_id','pakej_id','jilid_warta','no_warta','rujukan','catatan','tarikh_warta','tarikh_luput'];
    protected $dates = ['tarikh_warta','tarikh_luput'];

    public $timestamps = true;

    public function blok()
    {
    	return $this->belongsTo('App\Blok','blok_id','id');
    }

    public function pakej()
    {
    	return $this->belongsTo('App\Pakej','pakej_id','id');
    }
}
