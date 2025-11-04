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
}
