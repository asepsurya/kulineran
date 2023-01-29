<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function produk(){
        return $this->belongsTo('App\Models\Produk','idProduk');
    }

}
