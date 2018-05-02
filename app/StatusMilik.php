<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusMilik extends Model
{
    protected $table = 'status_milik';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','kod'];

    public $timestamps = false;
}
