<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\Santri;
use App\Jenis;
use Validator;
use Toastr;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pembayaran.index');
    }

    public function search(Request $request)
    {
       $this->validate($request, [
           'nis' => 'required'
       ]);

       $nis = $request->input('nis');
       if ($cari = Santri::where('nis', $nis)->first()) {
           session(['datanis' => $cari]);
           return redirect()->route('pembayaran.create')->with(['datanis1' => session('datanis')]);
       }
       else {
           return redirect()->back()->withErrors(['nis' => 'Nis tidak tersedia'])->withInput();
       }

       return redirect()->back()->withInput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(session()->get('datanis'));
        $datanis = session('datanis1') == null ? session('datanis') : session('datanis1');
        $santri = Santri::get();
        $jenis = Jenis::get();
        return view('pembayaran.create', [
            'vJenis' => $jenis,
            'vSantri' => $santri,
            'datanis' => $datanis,
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
        // dd($request->all());
        $rules = [
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jenis_pembayaran' => 'required',
            'tgl_pembayaran' => 'required',
        ];
        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->route('pembayaran.create')->with(['datanis1' => session('datanis')])->withErrors($valid)->withInput();
        }
        else {
            $pembayaran = new Pembayaran;
            $pembayaran->santri_id = $request->id_santri;
            $pembayaran->jenisbayar_id = $request->jenis_pembayaran;
            $pembayaran->tgl_pembayaran = $request->tgl_pembayaran;
            $pembayaran->bayar = 0;
            $pembayaran->total = 0;
            $pembayaran->save();
            session(['datanote' . $pembayaran->santri_id => [
                [
                    'tgl_pembayaran' => $pembayaran->tgl_pembayaran,
                    'jenis_pembayaran' => $pembayaran->jenis->namapembayaran,
                    'jumlah' => $pembayaran->jenis->jumlah
                ]
            ]]);
            Toastr::success('Data berhasil disimpan', 'Sukses');
            return redirect()->route('pembayaran.edit', ['id'=>$pembayaran->santri_id]);
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
        $santri = Santri::find($id)->first();
        $data = [
            'id' => $id,
            'nis' => $santri->nis,
            'nama' => $santri->nama,
            'nama_kelas' => $santri->kelas->nama_kelas,
        ];
        // Pembayaran::where('santri_id', $id)->get();
        $data_pem = Pembayaran::where('santri_id', $id)->paginate(5);
        $data_note = session('datanote' . $id);
        $jenis = Jenis::get();
        // dd($data_note);
        return view('pembayaran.edit', [
            'vJenis' => $jenis,
            'data' => $data,
            'data_pem' => $data_pem,
            'data_note' => $data_note
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
        $rules = [
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jenis_pembayaran' => 'required',
            'tgl_pembayaran' => 'required',
        ];
        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            // $errors = $valid->errors()->all();
            // Toastr::error('<ul><li>' . implode('</li><li>', $errors) . '</li></ul>', 'Kesalahan');
            return redirect()->route('pembayaran.edit', ['id'=>$id])->withErrors($valid)->withInput();
        }
        else {
            $pembayaran = new Pembayaran;
            $pembayaran->santri_id = $request->id_santri;
            $pembayaran->jenisbayar_id = $request->jenis_pembayaran;
            $pembayaran->tgl_pembayaran = $request->tgl_pembayaran;
            $pembayaran->bayar = 0;
            $pembayaran->total = 0;
            $pembayaran->save();
            $datasession = [
                'tgl_pembayaran' => $pembayaran->tgl_pembayaran,
                'jenis_pembayaran' => $pembayaran->jenis->namapembayaran,
                'jumlah' => $pembayaran->jenis->jumlah
            ];
            $ses = array_values(session('datanote' . $pembayaran->santri_id));
            array_push($ses, $datasession);
            session(['datanote' . $pembayaran->santri_id => $ses]);

            // session(['datanote' . $pembayaran->santri_id => [
            //     [
            //         'tgl_pembayaran' => $pembayaran->tgl_pembayaran,
            //         'jenis_pembayaran' => $pembayaran->jenis->namapembayaran,
            //         'jumlah' => $pembayaran->jenis->jumlah
            //     ]
            // ]]);
            Toastr::success('Data berhasil disimpan', 'Sukses');
            return redirect()->route('pembayaran.edit', ['id'=>$pembayaran->santri_id]);
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
        //
    }
}
