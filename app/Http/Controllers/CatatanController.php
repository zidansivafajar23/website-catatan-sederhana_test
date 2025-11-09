<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Catatan;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
     /**
     * DELETE - Menghapus catatan dari database
     * Dibuat oleh: IRJI
     */
    public function destroy($id)
    {
        $catatan = Catatan::findOrFail($id);
        $catatan->delete();

        return redirect()->route('catatan.index')
            ->with('success', 'Catatan berhasil dihapus!');
    }
    /**
     * READ - Menampilkan semua catatan
     * Dibuat oleh: AMAR
     */
    public function index()
    {
        $catatans = Catatan::latest()->get();
        return view('catatan.index', compact('catatans'));
    }
    /**
     * Menampilkan detail satu catatan
     * Dibuat oleh: AMAR
     */
    public function show($id)
    {
        $catatan = Catatan::findOrFail($id);
        return view('catatan.show', compact('catatan'));
    }

    /**
     * Menampilkan form untuk membuat catatan baru
     * Dibuat oleh: ZIDAN
     */
    public function create()
    {
        return view('catatan.create');
    }

    /**
     * ADD - Menyimpan catatan baru ke database
     * Dibuat oleh: ZIDAN
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required'
        ]);

        Catatan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('catatan.index')
            ->with('success', 'Catatan berhasil ditambahkan!');
    }
}
