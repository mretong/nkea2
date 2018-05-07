<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','no_pekerja','ptj_id'];

    public $timestamps = true;

    public function ptj()
    {
    	return $this->hasOne('App\Ptj','ptj_id','id');
    }
}
