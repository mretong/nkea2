<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id';
    protected $fillable = ['pemilik_id','bank_id','perbicaraan_id','no_akaun','kaedah_bayar_id','no_baucer','tarikh_baucer','no_cek','tarikh_cek','rujukan','catatan','status_id','rujukan_denda','tarikh_denda','attachment'];

    public $timestamps = false;

    public function pemilik()
    {
    	return $this->belongsTo('App\Pemilik','pemilik_id','id');
    }

    public function bank()
    {
    	return $this->hasOne('App\Bank','bank_id','id');
    }

    public function perbicaraan()
    {
    	return $this->belongsTo('App\Perbicaraan','perbicaraan_id','id');
    }
    
    public function kaedah_bayar()
    {
    	return $this->hasOne('App\KaedahBayar','kaedah_bayar_id','id');
    }

    public function status()
    {
    	return $this->hasOne('App\StatusBayar','status_id','id');
    }
}
