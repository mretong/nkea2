<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KaedahBayar extends Model
{
    protected $table = 'kaedah_bayar';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','kod'];

    public $timestamps = false;
}
