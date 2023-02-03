<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outlet extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function province(){
        return $this->belongsTo('App\Models\Province','id_provinsi');
    }
    public function regency(){
        return $this->belongsTo('App\Models\Regency','id_kabupaten');
    }
    public function district(){
        return $this->belongsTo('App\Models\District','id_kecamatan');
    }
    public function village(){
        return $this->belongsTo('App\Models\Village','id_desa');
    }
}
