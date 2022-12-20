<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    protected $table ='giangvien';
    protected $primaryKey = 'id';
    protected $guarded = []; 


   public function khoa(){
        return $this->hasOne(Khoa::class,'id','khoa_id');
   }
}
