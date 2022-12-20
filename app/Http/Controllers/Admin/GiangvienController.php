<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GiangVien;
use App\Models\Khoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\GiangVienRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GiangvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $giangviens = GiangVien::where('tengv','like','%' . $request->get('search') . '%' )
                                    ->orderBy('id','asc')
                                    ->paginate(3)
                                    ->appends(['search' => $request->get('search')]);
       

        return view('giangvien.index',compact('giangviens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khoas = Khoa::all();

        return view('giangvien.create',compact('khoas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GiangVienRequest $request)
    {
        // $data = [
            
        //     'tengv' => $request->input('tengv'),
        //     'gioitinh' => $request->input('gioitinh'),
        //     'ngaysinh' => $request->input('ngaysinh'),
        //     'sodienthoai' => $request->input('sodienthoai'),
        //     'khoa_id' => $request->input('khoa')
        // ];

        // GiangVien::create($data);

        // return redirect()->back()->with('success','Thêm thành công !');
        $des = 'public/upload';
        $imgname = $request->file('anhdaidien')->getClientOriginalName();
       
        $giangvien = new GiangVien();
       
        $giangvien->tengv = $request->input('tengv');
        $giangvien->gioitinh = $request->input('gioitinh');
        $giangvien->ngaysinh = $request->input('ngaysinh');
        $giangvien->sodienthoai = $request->input('sodienthoai');
        $giangvien->email = $request->input('email');
        $giangvien->khoa_id = $request->input('khoa');
        $giangvien->chucdanh = $request->input('chucdanh');
        
        $giangvien->avatar = $imgname;
        $giangvien->save();
        $request->file('anhdaidien')->move($des,$imgname);
        $user = new User();
        $user->name = $request->input('tengv');
        $user->email = $request->input('email');
        $user->password = Hash::make('11111111');
        $user->typeuser = 'teacher';
        $user->save();
        return redirect()->back()->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $giangvien = GiangVien::find($id);
        $khoas = Khoa::all();
        return view('giangvien.edit',compact('giangvien','khoas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            
            'tengv' => $request->input('tengv'),
            'gioitinh' => $request->input('gioitinh'),
            'ngaysinh' => $request->input('ngaysinh'),
            'sodienthoai' => $request->input('sodienthoai'),
            'khoa_id' => $request->input('khoa')
        ];

        DB::table('giangvien')->where('id', $id)->update($data);

        $data = $request->except(['_token','_method','image_old']);

        if ($request->hasFile('anhdaidien')){
            $file = $request->anhdaidien;
            $fileName = $file->getClientOriginalName();
            $file->getClientOriginalExtension();
            $file->getSize();

            $path = $file->move('public/upload/',$file->getClientOriginalName());
            $data['anhdaidien'] = $fileName;

            $file_name_old = $request->get('image_old');
            if ($file_name_old != ''){
                unlink('public/upload/' . $file_name_old);
            }
        }

        return redirect()->back()->with('success', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('giangvien')->where('id', $id)->delete();

        return redirect()->back()->with('delete','Xóa thành công!');
    }
}
