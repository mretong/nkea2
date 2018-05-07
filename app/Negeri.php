<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negeri extends Model
{
    protected $table = 'negeri';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','kod'];

    public $timestamps = true;

    public function blok()
    {
    	return $this->belongsToMany('App\Blok');
    }

}
