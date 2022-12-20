<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FogotRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\SinhVien;

class AccountController extends Controller
{
    public function showLogin()
    {
        return view('account.login');
    }

    public function showRegister()
    {
        return view('account.register');
    }

    public function login(LoginRequest $request)
    {

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $remember = $request->input('remember');

        if (Auth::attempt($data,$remember)){
            if (Auth::user()->typeuser == 'admin'){
                return redirect()->route('home')->with('success','Đăng nhập thành công!');
            }

            if (Auth::user()->typeuser == 'student'){
                $email = $request->input('email');
                $account = DB::table('sinhvien')->where('email',$email)->first();
                // $sinhvien = DB::table('sinhvien')->where('hovaten',$account->name)->first();
                
                if (!$account){
                    return redirect()->route('login')->with('warning','Tài khoản không tồn tại!');
                }
                // return redirect()->route('home')->with('success','Đăng nhập sinh viên thành công!');
                // return view('profile',compact('sinhvien'));
                return  redirect('admin/accountStudent/' . $account->id);
            }

            if (Auth::user()->typeuser == 'teacher'){
                $email = $request->input('email');
                $account = DB::table('giangvien')->where('email',$email)->first();
                // $sinhvien = DB::table('sinhvien')->where('hovaten',$account->name)->first();
                
                if (!$account){
                    return redirect()->route('login')->with('warning','Tài khoản không tồn tại!');
                }
                // return redirect()->route('home')->with('success','Đăng nhập sinh viên thành công!');
                // return view('profile',compact('sinhvien'));
                return redirect()->route('home')->with('success','Đăng nhập giáo viên thành công!');
            }
        }else{
            return redirect()->route('login')->with('warning','Tài khoản không tồn tại!');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }

    public function register(RegisterRequest $request)
    {
        

        $user = DB::table('users')->where('email', $request->input('email'))->first();
        if (!$user) {

            $newUser = new User();
            $newUser->name = $request->input('name');
            $newUser->email = $request->input('email');

            $newUser->password = bcrypt($request->input('password'));

            $newUser->save();

            return redirect()->route('register')->with('register', 'Đăng kí thành công mời đăng nhập');
        } else {
            return redirect()->route('register')->with('warning', 'Email đã tồn tại mời đăng nhập');
        }
    }

    public function resetPassword($id){
        $user = User::find($id);
        return view('account.recover-password',compact('user'));
    }

    public function forgotPassword(){
        return view('account.forgot-password');
    }

    public function postforgotPassword(FogotRequest $request){
        $email = $request->input('email');

        $user = DB::table('users')->where('email', $email)->first();

        if ($user != NULL){
            return redirect()->route('resetpassword',$user->id);
        }else {
            return redirect()->back()->with('warning','Email không tồn tại!');
        }

        
    }

    public function changePassword(PasswordRequest $request,$id){
        if ($request->input('password') != $request->input('password_confirm')){
            return redirect()->back()->with('warning','Sai mật khẩu!');
        }else {
            $data = [
                'password' => bcrypt($request->input('password')),
            ];

            DB::table('users')->where('id',$id)->update($data);

            return redirect()->back()->with('success','Đổi thành công mời đăng nhập!');
        }
    }
}
