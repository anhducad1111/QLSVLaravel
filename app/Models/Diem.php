<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SinhVien;
use App\Models\Monhoc;
class Diem extends Model
{
    protected $table ='diem';
    protected $primaryKey = 'id';
    protected $guarded = []; 

    public function sinhvien(){
        return $this->hasOne(SinhVien::class,'id','sinhvien_id');
    }

    public function monhoc(){
        return $this->hasOne(Monhoc::class,'id','monhoc_id');
    }
}
