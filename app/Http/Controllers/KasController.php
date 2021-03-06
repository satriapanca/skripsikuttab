<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kas;
use App\Pengajar;
use Validator;
use Toastr;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kas::all();
        return view('kas.index', [
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
        return view('kas.create');
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
            'kode' => 'required',
            'keterangan' => 'required',
        ];

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else {
            $kas = new Kas;
            $kas->kode = $request->kode;
            $kas->keterangan = $request->keterangan;
            $kas->tanggal = $request->tanggal;
            $kas->masuk = $request->masuk;
            $kas->keluar = $request->keluar;
            $kas->save();
            Toastr::success('Data berhasil disimpan', 'Sukses');
            return redirect()->route('kas.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kas::findOrFail($id)->delete();
        return redirect()->route('kas.index');
    }
}
