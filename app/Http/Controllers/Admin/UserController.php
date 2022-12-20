<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\Models\SinhVien;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->where('name', 'like', '%' . $request->get('search') . '%')
            ->orwhere('typeuser', 'like', '%' . $request->get('search') . '%')
            ->orderBy('id', 'asc')
            ->paginate(3)
            ->appends(['search' => $request->get('search')]);



        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $sinhviens = SinhVien::all();

        // return view('user.create_student', compact('sinhviens'));
        return view('user.create');
    }

    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

            $email = DB::table('users')->where('email',$request->input('email'))->first();

            if (!$email){
                $data = [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                    'typeuser' => $request->input('quyen')
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
        $user = User::find($id);

        return view('user.edit', compact('user'));
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
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'typeuser' => $request->input('quyen')
        ];

        DB::table('users')->where('id', $id)->update($data);

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
        DB::table('users')->where('id', $id)->delete();

        return redirect()->back()->with('delete','Xóa thành công!');
    }

    
}
