<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    protected $table ='khoa';
    protected $primaryKey = 'id';
    protected $guarded = []; 

   public function lops(){
        return $this->hasMany(Lop::class,'id','khoa_id');
   }

   
}
