<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mukim extends Model
{
    protected $table = 'mukim';
    protected $primaryKey = 'id';
    protected $fillable = ['id_daerah','id_wilayah','nama'];

    public $timestamps = false;

    public function daerah()
    {
    	return $this->belongsTo('App\Daerah','id_daerah','id');
    }

    public function wilayah()
    {
    	return $this->belongsTo('App\Wilayah','id_wilayah','id');
    }
}
