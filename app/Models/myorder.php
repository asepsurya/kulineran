<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myorder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pesanan(){
        return $this->hasMany('App\Models\Pesanan','noPesanan');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','idUser');
    }
  

}
