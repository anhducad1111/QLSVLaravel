<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Monhoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MonhocRequest;
use App\Models\Khoa;

class MonhocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monhocs = Monhoc::paginate(4);

        return view('monhoc.index',compact('monhocs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khoas = Khoa::all();
        return view('monhoc.create',compact('khoas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MonhocRequest $request)
    {
        $data = [
            
            'tenmon' => $request->tenmon,
            'sotinchi' => $request->sotinchi,
            'sotiet' => $request->sotiet,
            'khoa_id' => $request->khoa,
        ];

        DB::table('monhoc')->insert($data);

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
        $monhoc = Monhoc::find($id);
        $khoas = Khoa::all();

        return view('monhoc.edit',compact('monhoc','khoas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MonhocRequest $request, $id)
    {
        $data = [
            'tenmon' => $request->input('tenmon'),
            'sotinchi' => $request->input('sotinchi'),
            'sotiet' => $request->input('sotiet'),
            'khoa_id' => $request->input('khoa'),
        ];

        DB::table('monhoc')->where('id',$id)->update($data);

        return redirect()->back()->with('success','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('monhoc')->where('id',$id)->delete();

        return redirect()->back()->with('delete','Xóa thành công!');
    }
}
