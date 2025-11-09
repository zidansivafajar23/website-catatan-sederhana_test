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
}
