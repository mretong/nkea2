<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusBicara extends Model
{
    protected $table = 'status_bicara';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','kod'];

    public $timestamps = false;
}
