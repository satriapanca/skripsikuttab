<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Validator;
use Toastr;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::orderby('id', 'desc')->paginate(5);
        return view('kategori.index', [
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
        return view('kategori.create');
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
            'namakategori' => 'required',
        ];

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else {
            $kategori = new Kategori;
            $kategori->namakategori = $request->namakategori;
            $kategori->save();
            Toastr::success('Data berhasil disimpan', 'Sukses');
            return redirect()->route('kategori.index');
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
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', [
            'data' => $kategori,
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
            'namakategori' => 'required',
        ];

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else {
            $kategori = Kategori::findOrFail($id);
            $kategori->namakategori = $request->namakategori;
            $kategori->save();
            Toastr::success('Data berhasil disimpan', 'Sukses');
            return redirect()->route('kategori.index');
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
      $data = Kategori::findOrFail($id)->delete();
      return redirect()->route('kategori.index');
    }
}
