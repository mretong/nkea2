<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $table = 'pemilik';
    protected $primaryKey = 'id';
    protected $fillable = ['lot_id','status_milikan_id','nama','no_kp','kategori_pampasan_id','pecahan','tarikh_h','tarikh_terima','rujukan_jkptg','rujukan_jps'];

    public $timestamps = true;

    public function lot()
    {
    	return $this->belongsTo('App\Lot','lot_id','id');
    }

    public function milikan()
    {
    	return $this->belongsTo('App\StatusMilik','status_milikan_id','id');
    }

    public function kategori_pampasan()
    {
    	return $this->belongsTo('App\KategoriPampasan','kategori_pampasan_id','id');
    }
}
