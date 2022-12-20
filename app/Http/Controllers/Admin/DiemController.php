<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diem;
use App\Models\Monhoc;
use App\Models\SinhVien;
use Illuminate\Http\Request;
use App\Http\Requests\DiemRequest;
use Illuminate\Support\Facades\DB;

class DiemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
   $  * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('search') != NULL || $request->get('hocky') != NULL) {
            if (
                $request->get('search') == 'A' || $request->get('search') == 'B' || $request->get('search') == 'C'
                || $request->get('search') == 'D'
                || $request->get('search') == 'F'
            ) {
                $diems = Diem::where('diemchu', 'like', '%' . $request->get('search') . '%')
                    ->where('hocky', 'like', '%' . $request->get('hocky') . '%')
                    ->orderBy('id', $request->get('sapxep') == 'asc' ? 'asc' : 'desc')
                    ->paginate(5)

                    ->appends([
                        'search' => $request->get('search'),
                        // 'hocky' => $request->get('hocky')
                    ]);

                return view('diem.index', compact('diems'));
            } else {
                $diems = Diem::where('diemtong', 'like', '%' . $request->get('search') . '%')
                    ->where('hocky', 'like', '%' . $request->get('hocky') . '%')
                    ->orderBy('id', $request->get('sapxep') == 'asc' ? 'asc' : 'desc')
                    ->paginate(5)

                    ->appends([
                        'search' => $request->get('search'),
                        // 'hocky' => $request->get('hocky')
                    ]);
                return view('diem.index', compact('diems'));
            }
        } else {
            $diems = Diem::where('hocky', 'like', '%' . $request->get('hocky') . '%')
                ->orderBy('id', $request->get('sapxep') == 'asc' ? 'asc' : 'desc')
                ->paginate(5)

                ->appends([

                    'hocky' => $request->get('hocky')
                ]);

            return view('diem.index', compact('diems'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $monhocs = Monhoc::all();
        $sinhviens = SinhVien::all();
        return view('diem.create', compact('monhocs', 'sinhviens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiemRequest $request)
    {

        $diemtong = $request->input('diemcc') * 0.1 +
            $request->input('diemtx') * 0.2 +
            $request->input('diemgk') * 0.2 +
            $request->input('diemck') * 0.5;
        $data = [
            'diemcc' => $request->input('diemcc'),
            'diemtx' => $request->input('diemtx'),
            'diemgk' => $request->input('diemgk'),
            'diemck' => $request->input('diemck'),
            'diemtong' => $diemtong,

            'monhoc_id' => $request->input('monhoc'),
            'sinhvien_id' => $request->input('tensinhvien'),
            'hocky' => $request->input('hocky')
        ];

        if ($diemtong >= 8.5 && $diemtong <= 10) {
            $data['diemchu'] = 'A';
        } else if ($diemtong >= 7 && $diemtong < 8.5) {
            $data['diemchu'] = 'B';
        } else if ($diemtong >= 6 && $diemtong < 7) {
            $data['diemchu'] = 'C';
        } else if ($diemtong >= 5 && $diemtong < 6) {
            $data['diemchu'] = 'D';
        } else if ($diemtong < 5) {
            $data['diemchu'] = 'F';
        }


        Diem::create($data);

        return redirect()->route('diem.create')->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diems = DB::table('diem')->where('sinhvien_id', $id)->get();


        return view('diem.show', compact('diems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $diem = Diem::find($id);
        $monhoc = Monhoc::find($diem->monhoc_id);
        $sinhvien = Sinhvien::find($diem->sinhvien_id);

        return view('diem.edit', compact('diem', 'monhoc', 'sinhvien'));
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
        $diemtong = $request->input('diemcc') * 0.1 +
            $request->input('diemtx') * 0.2 +
            $request->input('diemgk') * 0.2 +
            $request->input('diemck') * 0.5;
        $data = [
            'diemcc' => $request->input('diemcc'),
            'diemtx' => $request->input('diemtx'),
            'diemgk' => $request->input('diemgk'),
            'diemck' => $request->input('diemck'),
            'diemtong' => $diemtong,


            'hocky' => $request->input('hocky')
        ];

        if ($diemtong >= 8.5 && $diemtong <= 10) {
            $data['diemchu'] = 'A';
        } else if ($diemtong >= 7 && $diemtong < 8.5) {
            $data['diemchu'] = 'B';
        } else if ($diemtong >= 6 && $diemtong < 7) {
            $data['diemchu'] = 'C';
        } else if ($diemtong >= 5 && $diemtong < 6) {
            $data['diemchu'] = 'D';
        } else if ($diemtong < 5) {
            $data['diemchu'] = 'F';
        }

        DB::table('diem')->where('id', $id)->update($data);

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
        DB::table('diem')->where('id', $id)->delete();

        return redirect()->back()->with('delete','Xóa thành công!');
    }
}
