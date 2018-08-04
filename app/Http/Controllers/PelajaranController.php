<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelajaran;
use App\Kategori;
use Validator;
use Toastr;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pelajaran::orderby('id', 'desc')->paginate(5);
        return view('pelajaran.index', [
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
        $kategori = Kategori::get();
        return view('pelajaran.create', [
            'vKategori' => $kategori
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
            'namapelajaran' => 'required',
            'sub_pelajaran' => 'required',
        ];

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else {
            $pelajaran = new Pelajaran;
            $pelajaran->namapelajaran = $request->namapelajaran;
            $pelajaran->sub_pelajaran = $request->sub_pelajaran;
            $pelajaran->kategori_id = $request->namakategori;
            $pelajaran->save();
            Toastr::success('Data berhasil disimpan', 'Sukses');
            return redirect()->route('pelajaran.index');
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
        $pelajaran = Pelajaran::findOrFail($id);
        $kategori = Kategori::get();
        return view('pelajaran.edit', [
            'data' => $pelajaran,
            'vKategori' => $kategori
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
            'namapelajaran' => 'required',
            'sub_pelajaran' => 'required',
        ];

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else {
            $pelajaran = Pelajaran::findOrFail($id);
            $pelajaran->namapelajaran = $request->namapelajaran;
            $pelajaran->sub_pelajaran = $request->sub_pelajaran;
            $pelajaran->kategori_id = $request->namakategori;
            $pelajaran->save();
            Toastr::success('Data berhasil disimpan', 'Sukses');
            return redirect()->route('pelajaran.index');
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
        $data = Pelajaran::findOrFail($id)->delete();
        return redirect()->route('pelajaran.index');
    }
}
