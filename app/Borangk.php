<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borangk extends Model
{
    protected $table = 'borang_k';
    protected $primaryKey = 'id';
    protected $fillable = ['blok_id','lot_id','tarikh_k','tarikh_terima','rujukan_jkptg','rujukan_jps','rujukan_fail','attachment'];
    protected $dates = ['tarikh_k','tarikh_terima'];

    public $timestamps = true;

    public function blok()
    {
    	return $this->belongsTo('App\Blok','blok_id','id');
    }

    public function lot()
    {
    	return $this->belongsTo('App\Lot','lot_id','id');
    }

}
