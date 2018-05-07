<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriPampasan extends Model
{
    protected $table = 'kategori_pampasan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','kod'];

    public $timestamps = true;
}
