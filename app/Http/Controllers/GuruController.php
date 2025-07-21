<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::latest()->paginate(10);
        return view('admin.guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guru.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kontak' => 'nullable',
            'deskripsi' => 'nullable',
        ]);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }
        Guru::create($data);
        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.form', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);
        $data = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kontak' => 'nullable',
            'deskripsi' => 'nullable',
        ]);
        if ($request->hasFile('foto')) {
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }
        $guru->update($data);
        return redirect()->route('guru.index')->with('success', 'Guru berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus');
    }

    // PUBLIK: Tampilkan semua staff/guru
    public function publicIndex()
    {
        $tipe = request('tipe', 'Guru');
        $gurus = Guru::where('tipe', $tipe)->orderBy('nama')->get();
        return view('staff', compact('gurus', 'tipe'));
    }
}
