<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Tamu',
            'tamus' => Tamu::get()
        ];
        return view('admin.tamu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tamu'
        ];
        return view('admin.tamu.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'noktp' => 'required|min:15',
            'nama' => 'required',
            'email' => 'required|email|unique:tamus,email',
            'no_hp' => 'required',
            'warga_negara' => 'required',
            'alamat' => 'required'
        ]);
        $save = Tamu::create([
            'noktp' => $request->noktp,
            'nama' => $request->nama,
            'email' => $request->email,
            'jenkel' => $request->jenkel,
            'no_hp' => $request->no_hp,
            'warga_negara' => $request->warga_negara,
            'alamat' => $request->alamat
        ]);
        if ($save) {
            return redirect()->route('tamu.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('tamu.index')->with('failed', 'Data gagal ditambahkan');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function edit(Tamu $tamu)
    {
        $data = [
            'title' => 'Tamu',
            'tamus' => $tamu
        ];
        return view('admin.tamu.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tamu $tamu)
    {
        $request->validate([
            'noktp' => 'required|min:15',
            'nama' => 'required',
            'email' => 'required',
            'jenkel' => 'required',
            'no_hp' => 'required',
            'warga_negara' => 'required',
            'alamat' => 'required'
        ]);
        $update = $tamu->update([
            'noktp' => $request->noktp,
            'nama' => $request->nama,
            'email' => $request->email,
            'jenkel' => $request->jenkel,
            'no_hp' => $request->no_hp,
            'warga_negara' => $request->warga_negara,
            'alamat' => $request->alamat
        ]);
        if ($update) {
            return redirect()->route('tamu.index')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('tamu.index')->with('failed', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tamu $tamu)
    {
        $delete = $tamu->delete();
        if ($delete) {
            return redirect()->route('tamu.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('tamu.index')->with('failed', 'Data gagal dihapus');
        }
    }
}
