<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('khoa')->insert([
            [
                
                'tenkhoa' => 'Khoa Học Máy Tính'
            ]
        ]);

        DB::table('lop')->insert([
            [
                
                'tenlop' => '21JIT',
                'khoa_id' => '1'
            ]
        ]);

        DB::table('sinhvien')->insert([
            [ 'hovaten' => 'Nguyễn Quốc An','gioitinh'=>'Nam','ngaysinh'=>'2003-09-07','quequan'=>'...','anhdaidien' => null,'lop_id'=>'1'],
            [  'hovaten' => 'Nguyễn Quốc Cường','gioitinh'=>'Nữ','ngaysinh'=>'2017-12-11','quequan'=>'...','anhdaidien' => null,'lop_id'=>'1'],
            [  'hovaten' => 'Nguyễn Quốc Dũng','gioitinh'=>'Nam','ngaysinh'=>'2017-12-11','quequan'=>'...','anhdaidien' => null,'lop_id'=>'1'],
            

        ]);

        DB::table('monhoc')->insert([
            [ 'tenmon' => 'Kỹ năng mềm','sotinchi'=>2,'sotiet'=>30,'khoa_id'=>1],
            [ 'tenmon' => 'Đường lối cách mạng của ĐCS VN','sotinchi'=>3,'sotiet'=>45,'khoa_id'=>1],
            [ 'tenmon' => 'Tiếng Anh cơ bản 2','sotinchi'=>3,'sotiet'=>45,'khoa_id'=>1],
            [ 'tenmon' => 'Vật lý 2 và thí nghiệm','sotinchi'=>3,'sotiet'=>45,'khoa_id'=>1],
            [ 'tenmon' => 'Toán rời rạc','sotinchi'=>2,'sotiet'=>30,'khoa_id'=>1],
            [ 'tenmon' => 'Cơ sở dữ liệu','sotinchi'=>3,'sotiet'=>45,'khoa_id'=>1],
            [ 'tenmon' => ' Bóng chuyền ','sotinchi'=>1,'sotiet'=>45,'khoa_id'=>1],


            [ 'tenmon' => 'Toán kỹ thuật','sotinchi'=>2,'sotiet'=>30,'khoa_id'=>1],
            [ 'tenmon' => 'Cấu kiện điện tử','sotinchi'=>2,'sotiet'=>30,'khoa_id'=>1],
            [ 'tenmon' => 'Lý thuyết mạch','sotinchi'=>2,'sotiet'=>30,'khoa_id'=>1],
            [ 'tenmon' => 'Cầu lông ','sotinchi'=>1,'sotiet'=>45,'khoa_id'=>1],

        ]);


        DB::table('diem')->insert([
            ['diemcc' =>10,'diemtx'=>10,'diemgk'=>10,'diemck'=>10,'diemtong'=>null,'monhoc_id'=>1,'sinhvien_id'=>1,'hocky' => 1],
        ]);

        
        DB::table('giangvien')->insert([
            [
                
                
                'tengv' => 'Võ Ngọc Đạt',
                'ngaysinh' => '1999-09-07',
                'gioitinh' => 'Nam',
                'sodienthoai' => '0356593936',
                'chucdanh' => 'Tiến sĩ',
                'khoa_id' => '1'

            ]
        ]);

        DB::table('users')->insert([
            [
                
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'typeuser' => 'admin',
                
            ]
        ]);
    }
}
