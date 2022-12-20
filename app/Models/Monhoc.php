<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monhoc extends Model
{
    protected $table ='monhoc';
    protected $primaryKey = 'id';
    protected $guarded = []; 

    public function getKhoa(){
        return $this->hasOne(Khoa::class,'id','khoa_id');
    }

}
