<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perbicaraan extends Model
{
    protected $table = 'perbicaraan';
    protected $primaryKey = 'id';
    protected $fillable = ['tarikh_1','tarikh_2','tarikh_3','tarikh_4','tarikh_5','daerah_id','mukim_id','blok_id','lot_id','staff_id','status_id','bil_pemilik','luas_ambil','harga_tanah','wakil_mada','wakil_jps','bilangan_bicara','pampasan','kos_lain','catatan','jajaran'];

    public $timestamps = false;

    public function daerah()
    {
    	return $this->belongsTo('App\Daerah','daerah_id','id');
    }

    public function mukim()
    {
    	return $this->belongsTo('App\Mukim','mukim_id','id');
    }

    public function blok()
    {
    	return $this->hasOne('App\Blok','blok_id','id');
    }

    public function lot()
    {
    	return $this->hasMany('App\Lot','lot_id','id');
    }

    public function staff()
    {
    	return $this->belongsToMany('App\Staff');
    }

    public function status()
    {
    	return $this->hasOne('App\StatusBicara','status_id','id');
    }


}
