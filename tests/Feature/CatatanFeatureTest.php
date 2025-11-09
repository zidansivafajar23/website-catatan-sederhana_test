<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Catatan;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Feature Test untuk Aplikasi Catatan Sederhana
 * 
 * Testing dilakukan oleh:
 * - Rafif Purnomo
 * - Dana
 * - Zidan
 * - Amar
 * - Irji
 */
class CatatanFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: CREATE - Dapat membuat catatan baru
     * Tested by: Rafif
     */
    public function test_can_create_catatan(): void
    {
        $data = [
            'judul' => 'Catatan Test',
            'deskripsi' => 'Ini adalah deskripsi test'
        ];

        $catatan = Catatan::create($data);

        $this->assertDatabaseHas('catatan', [
            'judul' => 'Catatan Test',
            'deskripsi' => 'Ini adalah deskripsi test'
        ]);
    }

     /**
     * Test: READ - Dapat membaca semua catatan
     * Tested by: Dhana
     */
    public function test_can_read_all_catatan(): void
    {
        Catatan::create([
            'judul' => 'Catatan 1',
            'deskripsi' => 'Deskripsi 1'
        ]);

        Catatan::create([
            'judul' => 'Catatan 2',
            'deskripsi' => 'Deskripsi 2'
        ]);

        $catatan = Catatan::all();
        $this->assertCount(2, $catatan);
    }

    /**
     * Test: DELETE - Dapat menghapus catatan
     * Tested by: Irji
     */
    public function test_can_delete_catatan(): void
    {
        $catatan = Catatan::create([
            'judul' => 'Catatan untuk dihapus',
            'deskripsi' => 'Akan dihapus'
        ]);

        $id = $catatan->id;
        $catatan->delete();

        $this->assertDatabaseMissing('catatan', ['id' => $id]);
    }
}
