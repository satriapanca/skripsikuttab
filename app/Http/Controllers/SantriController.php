<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Santri;
use App\Kelas;
use Validator;
use Toastr;

class SantriController extends Controller
{
    public function getCari(Request $r)
    {
      $data = Santri::where('nama', 'LIKE', '%' . $r->q . '%')->orderby('id', 'desc')->paginate(3);
      $data->appends(['q'=>$r->q]);
      return view('santri.index', [
          'vData' => $data
      ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Santri::orderby('id', 'desc')->paginate(5);
        return view('santri.index', [
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
        $kelas = Kelas::get();
        return view('santri.create', [
            'vKelas' => $kelas
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
            'nis' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_telp_ortu' => 'required',
        ];

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else {
            $santri = new Santri;
            $santri->nis = $request->nis;
            $santri->nama = $request->nama;
            $santri->gender = $request->gender;
            $santri->tempat_lahir = $request->tempat_lahir;
            $santri->tanggal_lahir = $request->tanggal_lahir .' 00:00:00';
            $santri->alamat = $request->alamat;
            $santri->nama_ayah = $request->nama_ayah;
            $santri->nama_ibu = $request->nama_ibu;
            $santri->no_telp_ortu = $request->no_telp_ortu;
            $santri->kelas_id = $request->nama_kelas;
            $santri->save();
            Toastr::success('Data berhasil disimpan', 'Sukses');
            return redirect()->route('santri.index');
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
        $santri = Santri::findOrFail($id);
        $kelas = Kelas::get();
        return view('santri.edit', [
            'data' => $santri,
            'vKelas' => $kelas
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
            'nis' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_telp_ortu' => 'required',
        ];

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->back()->withErrors($valid)->withInput();
        }
        else {
            $santri = Santri::findOrfail($id);
            $santri->nis = $request->nis;
            $santri->nama = $request->nama;
            $santri->gender = $request->gender;
            $santri->tempat_lahir = $request->tempat_lahir;
            $santri->tanggal_lahir = $request->tanggal_lahir .' 00:00:00';
            $santri->alamat = $request->alamat;
            $santri->nama_ayah = $request->nama_ayah;
            $santri->nama_ibu = $request->nama_ibu;
            $santri->no_telp_ortu = $request->no_telp_ortu;
            $santri->kelas_id = $request->nama_kelas;
            $santri->save();
            Toastr::success('Data berhasil disimpan', 'Sukses');
            return redirect()->route('santri.index');
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
        $data = Santri::findOrFail($id)->delete();
        return redirect()->route('santri.index');
    }
}
