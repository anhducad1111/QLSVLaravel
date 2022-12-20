<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    protected $table ='sinhvien';
    protected $primaryKey = 'id';
    protected $guarded = []; 

   public function getLop(){
        return $this->hasOne(Lop::class,'id','lop_id');
   }

   public function getAvatar(){
          return $this->hasOne(User::class,'id','svID');
   }

   
}
