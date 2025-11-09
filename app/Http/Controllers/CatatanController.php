<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
}
