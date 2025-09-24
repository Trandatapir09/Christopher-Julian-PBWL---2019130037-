<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all(); 
        return view('welcome', compact('mahasiswa'));
    }

        public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('edit', compact('mahasiswa'));
    }
    

  public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100',
            'jurusan' => 'required|string|max:50',
            'umur' => 'required|string|max:11',
            'alamat' => 'required|string|max:100',
            'notelp' => 'required|string|max:11',
            'status' => 'required|string|max:20',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('welcome')->with('success', 'Data berhasil diupdate');
    }

    public function create()
{
    return view('create');
}

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jurusan' => 'required|string|max:50',
            'umur' => 'required|integer',
            'alamat' => 'required|string|max:100',
            'notelp' => 'required|string|max:20',
            'status' => 'required|string|max:20',
        ]);

    Mahasiswa::create($request->all());

    return redirect()->route('welcome')->with('success', 'Data berhasil ditambahkan');
}
}
