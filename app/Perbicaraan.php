<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perbicaraan extends Model
{
    protected $table = 'perbicaraan';
    protected $primaryKey = 'id';
    protected $fillable = ['tarikh_1','daerah_id','mukim_id','blok_id','lot_id','staff_id','status_id','bil_pemilik','luas_ambil','harga_tanah','wakil_mada','wakil_jps','bilangan_bicara','pampasan','kos_lain','catatan','jajaran'];

    public $timestamps = true;

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
    	return $this->belongsTo('App\Blok','blok_id','id');
    }

    public function lot()
    {
    	return $this->belongsTo('App\Lot','lot_id','id');
    }

    public function staff()
    {
    	return $this->belongsTo('App\Staff','staff_id','id');
    }

    public function status()
    {
    	return $this->belongsTo('App\StatusBicara','status_id','id');
    }


}
