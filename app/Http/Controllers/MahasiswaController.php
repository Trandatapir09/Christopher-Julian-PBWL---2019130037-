<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Storage;

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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

         $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($mahasiswa->foto && Storage::disk('public')->exists($mahasiswa->foto)) {
                Storage::disk('public')->delete($mahasiswa->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $mahasiswa->update($data);

        return redirect()->route('welcome')->with('success', 'Data berhasil diupdate');
    }

    public function create()
{
    return view('create');
}

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|unique:mahasiswa,id', 
            'nama' => 'required|string|max:100',
            'jurusan' => 'required|string|max:50',
            'umur' => 'required|integer',
            'alamat' => 'required|string|max:100',
            'notelp' => 'required|string|max:20',
            'status' => 'required|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

                $data = $request->all();

        if ($request->hasFile('foto')) {
            // simpan ke storage/app/public/foto
            $path = $request->file('foto')->store('foto', 'public');
            $data['foto'] = $path;
        }

    Mahasiswa::create($data);

    return redirect()->route('welcome')->with('success', 'Data berhasil ditambahkan');
}

public function destroy($id)
{
    $mahasiswa = Mahasiswa::findOrFail($id);

       if ($mahasiswa->foto && Storage::disk('public')->exists($mahasiswa->foto)) {
            Storage::disk('public')->delete($mahasiswa->foto);
        }

    $mahasiswa->delete();

    return redirect()->route('welcome')->with('success', 'Data berhasil dihapus');
}
}
