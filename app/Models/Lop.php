<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $table ='lop';
    protected $primaryKey = 'id';
    protected $guarded = []; 

    public function khoa(){
        return $this->belongsTo(Khoa::class,'khoa_id','id');
    }

    public function sinhviens(){
        return $this->hasMany(SinhVien::class,'lop_id','id');
    }
}
