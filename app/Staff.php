<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','ptj_id'];

    public $timestamps = true;

    public function ptj()
    {
    	return $this->belongsTo('App\Ptj','ptj_id','id');
    }
}
