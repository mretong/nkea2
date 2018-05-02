<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    protected $table = 'daerah';
    protected $primaryKey = 'id';
    protected $fillable = ['id_negeri','nama','kod'];

    public $timestamps = false;

    public function negeri()
    {
    	return $this->belongsTo('App\Negeri','id_negeri','id');
    }
}
