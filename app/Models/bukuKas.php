<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukuKas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function Kpengeluaran(){
        return $this->belongsTo('App\Models\Kpengeluaran','id_kategori');
    }
    public function Kpemasukan(){
        return $this->belongsTo('App\Models\Kpemasukan','id_kategori');
    }
    public function rekening(){
        return $this->belongsTo('App\Models\Rekening','id_rekening');
    }
}
