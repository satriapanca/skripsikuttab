<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Pengajar;
use Validator;
use Toastr;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kelas::orderby('id', 'desc')->paginate(5);
        return view('kelas.index', [
            'vData' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengajar = Pengajar::get();
        return view('kelas.create', [
            'vPengajar' => $pengajar
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // https://laravel.com/docs/5.4/validation#available-validation-rules
        $rules = [
            'nama' => 'required',
            'thnakademik' => 'required',
        ];

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else {
            $kelas = new Kelas;
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->thnakademik = $request->thnakademik;
            $kelas->pengajar_id = $request->nama;
            $kelas->save();
            Toastr::success('Data berhasil disimpan', 'Sukses');
            return redirect()->route('kelas.index');
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
        $kelas = Kelas::findOrFail($id);
        $pengajar = Pengajar::get();
        return view('kelas.edit', [
            'data' => $kelas,
            'vPengajar' => $pengajar
        ]);
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
        // https://laravel.com/docs/5.4/validation#available-validation-rules
        $rules = [
            'nama' => 'required',
            'thnakademik' => 'required',
        ];

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else {
            $kelas = Kelas::findOrFail($id);
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->thnakademik = $request->thnakademik;
            $kelas->pengajar_id = $request->nama;
            $kelas->save();
            Toastr::success('Data berhasil diubah', 'Sukses');
            return redirect()->route('kelas.index');
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
        $data = Kelas::findOrFail($id)->delete();
        return redirect()->route('kelas.index');
    }
}
