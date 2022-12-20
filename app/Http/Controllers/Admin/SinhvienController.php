<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SinhvienRequest;
use App\Models\SinhVien;
use App\Models\Lop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SinhvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        $sinhviens = DB::table('sinhvien')
            ->where('hovaten','like','%' . $request->get('search') . '%' )
            
            ->orderBy('id','asc')
            ->paginate(3)
            ->appends(['search' => $request->get('search')]);
        
        // $sinhviens = SinhVien::paginate(3);

        return view('sinhvien.index',compact('sinhviens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $lops = Lop::all();

        return view('sinhvien.create',compact('lops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SinhvienRequest $request)
    {   
        $des = 'public/upload';
        $imgname = $request->file('anhdaidien')->getClientOriginalName();
        $sinhviens = new SinhVien();
       
        $sinhviens->hovaten = $request->input('hovaten');
        $sinhviens->lop_id = $request->input('lop');
        
        $sinhviens->gioitinh = $request->input('gioitinh');
        $sinhviens->email = $request->input('email');
        $sinhviens->ngaysinh = $request->input('ngaysinh');
        $sinhviens->quequan = $request->input('diachi');
        
        $sinhviens->anhdaidien = $imgname;
        $sinhviens->save();
        $request->file('anhdaidien')->move($des,$imgname);
        $user = new User();
        $user->name = $request->input('hovaten');
        $user->email = $request->input('email');
        $user->password = Hash::make('11111111');
        $user->typeuser = 'student';
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
        
        $sinhvien = SinhVien::find($id);
        $lop = Lop::find($sinhvien->lop_id);

        return view('sinhvien.show',compact('sinhvien','lop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   


        $sinhvien = SinhVien::find($id);
        $lops = Lop::all();
        
        return view('sinhvien.edit',compact('sinhvien','lops'));
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
        $data = $request->except(['_token','_method','lop','diachi','image_old']);

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

        DB::table('sinhvien')->where('id',$id)->update($data);

        return redirect()->route('sinhvien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $sinhvien = SinhVien::find($id);
        $file_name = $sinhvien->anhdaidien;
        if ($file_name != ''){
            unlink('public/upload/' . $file_name);
        }
       DB::table('sinhvien')->where('id',$id)->delete();
       

        return redirect()->route('sinhvien.index')->with('delete','Xóa thành công');
    }

    

    
}
