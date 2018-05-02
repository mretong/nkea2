<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusAduan extends Model
{
    protected $table = 'status_aduan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','kod'];

    public $timestamps = false;
}
