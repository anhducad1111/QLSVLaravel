<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SinhVien;
use App\Models\User;
use App\Http\Requests\AccountStudentRequest;
use App\Models\Diem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AccountStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sinhviens = SinhVien::all();

        return view('user.create_student', compact('sinhviens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountStudentRequest $request)
    {
        $email = DB::table('users')->where('email',$request->input('email'))->first();

        if (!$email){
            

            $sinhvien = DB::table('sinhvien')->where('hovaten',$request->input('name'))->first();
            
            
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'typeuser' => $request->input('quyen'),
                'svID' => $sinhvien->id
            ];

                
            User::create($data);
           
            return redirect()->back()->with('success', 'Thêm thành công!');
        }else {
            return redirect()->back()->with('warning','Email đã tồn tại!');
        }
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $sinhvien = SinhVien::where('id',$id)->first();

        $diems = Diem::where('sinhvien_id',$sinhvien->id)->get();
        
        if ($request->get('hocky')){
            $diems = Diem::where('sinhvien_id',$sinhvien->id)
                            ->where('hocky' , 'like', '%' . $request->get('hocky') . '%')
                            ->get();
        }
         
        return view('profile',compact('sinhvien','diems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
        if ($request->input('new_password') != NULL){
            $data1 = [
                'hovaten' => $request->input('hovaten'),
                'gioitinh' => $request->input('gioitinh'),
                'ngaysinh' => $request->input('ngaysinh'),
                'quequan' => $request->input('quequan'),
    
            ];
            $data2 = [
                'name' => $request->input('hovaten'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('new_password')),
            ];

            DB::table('sinhvien')->where('id',$id)->update($data1);
            DB::table('users')->where('email',$request->input('email'))->update($data2);

            return redirect()->back()->with('success','Sửa thành công!');
        }else{
            $data1 = [
                'hovaten' => $request->input('hovaten'),
                'gioitinh' => $request->input('gioitinh'),
                'ngaysinh' => $request->input('ngaysinh'),
                'quequan' => $request->input('quequan'),
    
            ];
            $data2 = [
                'name' => $request->input('hovaten'),
                'email' => $request->input('email'),
                
            ];
            DB::table('sinhvien')->where('id',$id)->update($data1);
            DB::table('users')->where('email',$request->input('email'))->update($data2);

            return redirect()->back()->with('success','Sửa thành công!');
        }
        

        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
