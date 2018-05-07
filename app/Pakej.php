<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pakej extends Model
{
    protected $table = 'pakej';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','kod'];

    public $timestamps = true;
}
