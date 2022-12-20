<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Khoa;
use App\Models\Lop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LopRequest;

class LopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $lops = Lop::paginate(4);

        return view('lop.index',compact('lops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khoas = Khoa::all();
        return view('lop.create',compact('khoas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            
            'tenlop' => $request->input('tenlop'),
            'khoa_id' => $request->input('khoa')
        ];
        Lop::create($data);

        return redirect()->back()->with('success','Thêm thành công!');
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
        $khoas = Khoa::all();
        $lop = Lop::find($id);
        return view('lop.edit', compact('lop','khoas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LopRequest $request, $id)
    {
        $data = [
            
            'tenlop' => $request->input('tenlop'),
            'khoa_id' => $request->input('khoa')
        ];

        DB::table('lop')->where('id', $id)->update($data);

        return redirect()->route('lop.index')->with('edit','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('lop')->where('id',$id)->delete();

        return redirect()->route('lop.index')->with('delete','Xóa thành công!');
    }
}
