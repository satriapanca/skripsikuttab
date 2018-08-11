<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilaiangka;
use App\Kelas;
use App\Pengajar;
use App\Santri;
use App\Pelajaran;
use Validator;
use Toastr;

class NilaiangkaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('nilaiangka.index', [
            'vKelas' => $kelas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    public function getUTS($uts)
    {
        $kelas = Kelas::find($uts);
        $pelajaran = Pelajaran::get();
        $santri = Santri::get();
        return view('nilaiangka.create', [
            'vKelas' => $kelas,
            'vPelajaran' => $pelajaran,
            'vSantri' => $santri
        ]);
    }
}
