<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;
use Validator;
use Toastr;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jenis::orderby('id', 'desc')->paginate(5);
        return view('jenis.index', [
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
        return view('jenis.create');
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
            'namapembayaran' => 'required',
            'jumlah' => 'required',
        ];

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else {
            $jenis = new Jenis;
            $jenis->namapembayaran = $request->namapembayaran;
            $jenis->jumlah = $request->jumlah;
            $jenis->save();
            Toastr::success('Data berhasil disimpan', 'Sukses');
            return redirect()->route('jenis.index');
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
        $jenis = Jenis::findOrFail($id);
        return view('jenis.edit', [
            'data' => $jenis
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
            'namapembayaran' => 'required',
            'jumlah' => 'required',
        ];

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else {
            $jenis = Jenis::findOrFail($id);
            $jenis->namapembayaran = $request->namapembayaran;
            $jenis->jumlah = $request->jumlah;
            $jenis->save();
            Toastr::success('Data berhasil disimpan', 'Sukses');
            return redirect()->route('jenis.index');
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
        $data = Jenis::findOrFail($id)->delete();
        return redirect()->route('jenis.index');
    }
}
