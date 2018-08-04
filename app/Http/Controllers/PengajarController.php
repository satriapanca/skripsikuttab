<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengajar;
use App\Jabatan;
use Validator;
use Toastr;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengajar::orderby('id', 'desc')->paginate(5);
        return view('pengajar.index', [
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
        $jabatan = Jabatan::get();
        return view('pengajar.create', [
            'vJabatan' => $jabatan
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
            'nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ];

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else {
            $pengajar = new Pengajar;
            $pengajar->nip = $request->nip;
            $pengajar->nama = $request->nama;
            $pengajar->gender = $request->jenis_kelamin;
            $pengajar->tempat_lahir = $request->tempat_lahir;
            $pengajar->tanggal_lahir = $request->tanggal_lahir .' 00:00:00';
            $pengajar->alamat = $request->alamat;
            $pengajar->no_telp = $request->no_telepon;
            $pengajar->jabatan_id = $request->jabatan;
            $pengajar->save();
            Toastr::success('Data berhasil disimpan', 'Sukses');
            return redirect()->route('pengajar.index');
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
        $pengajar = Pengajar::findOrFail($id);
        $jabatan = Jabatan::get();
        return view('pengajar.edit', [
            'data' => $pengajar,
            'vJabatan' => $jabatan
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
            'nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ];

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else {
            $pengajar = Pengajar::findOrFail($id);
            $pengajar->nip = $request->nip;
            $pengajar->nama = $request->nama;
            $pengajar->gender = $request->jenis_kelamin;
            $pengajar->tempat_lahir = $request->tempat_lahir;
            $pengajar->tanggal_lahir = $request->tanggal_lahir .' 00:00:00';
            $pengajar->alamat = $request->alamat;
            $pengajar->no_telp = $request->no_telepon;
            $pengajar->jabatan_id = $request->jabatan;
            $pengajar->save();
            Toastr::success('Data berhasil diubah', 'Sukses');
            return redirect()->route('pengajar.index');
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
        $data = Pengajar::findOrFail($id)->delete();
        return redirect()->route('pengajar.index');
    }
}
