<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $sql_account = 'select * from v_usercount';
        $sql_student = 'select * from v_studentcount';
        $sql_teacher = 'select * from v_teachercount';
        $sql_class = 'select * from v_classcount';

        $user_quantity = DB::select($sql_account);
        $student_quantity = DB::select($sql_student);
        $teacher_quantity = DB::select($sql_teacher);
        $class_quantity = DB::select($sql_class);
        $accounts = User::where('typeuser','admin');
        return view('index',compact('user_quantity','student_quantity','teacher_quantity','class_quantity','accounts'));
    }

   
}
