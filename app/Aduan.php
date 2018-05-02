<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    protected $table = 'aduan';
    protected $primaryKey = 'id';
    protected $fillable = ['no_aduan','tarikh_terima','tarikh_selesai','masa_terima','staff_id','lot_id','blok_id','no_hakmilik','nama_pengadu','no_tel','catatan','maklumbalas','status_aduan_id'];

    public $timestamps = false;

    public function staff()
    {
    	return $this->hasOne('App\Staff','staff_id','id');
    }

    public function lot()
    {
    	return $this->belongsTo('App\Lot','lot_id','id');
    }

    public function blok()
    {
    	return $this->belongsTo('App\Blok','blok_id','id');
    }

    public function status()
    {
    	return $this->hasOne('App\StatusAduan','status_aduan_id','id');
    }
}
