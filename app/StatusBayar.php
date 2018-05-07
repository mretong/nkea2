<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusBayar extends Model
{
    protected $table = 'status_bayar';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','kod'];

    public $timestamps = true;
}
