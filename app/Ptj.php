<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ptj extends Model
{
    protected $table = 'ptj';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','kod'];

    public $timestamps = false;
}
