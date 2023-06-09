<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kategori(){
        return $this->belongsTo('App\Models\kategori','idKategori');
    }
    public function outlet(){
        return $this->belongsTo('App\Models\outlet','idSupplier');
    }
}
