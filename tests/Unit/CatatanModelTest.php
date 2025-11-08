<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Catatan;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Unit Test untuk Model Catatan
 * 
 * Testing dilakukan oleh:
 * - Rafif Purnomo
 * - Dana
 * - Zidan
 * - Amar
 * - Irji
 */
class CatatanModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Model Catatan dapat dibuat (CREATE)
     * Tested by: Rafif
     */
    public function test_can_create_catatan_model(): void
    {
        $catatan = Catatan::create([
            'judul' => 'Test Judul',
            'deskripsi' => 'Test Deskripsi'
        ]);

        $this->assertInstanceOf(Catatan::class, $catatan);
        $this->assertEquals('Test Judul', $catatan->judul);
        $this->assertEquals('Test Deskripsi', $catatan->deskripsi);
    }

     /**
     * Test: Model Catatan dapat dibaca (READ)
     * Tested by: Dhana
     */
    public function test_can_read_catatan_model(): void
    {
        $catatan = Catatan::create([
            'judul' => 'Judul Test',
            'deskripsi' => 'Deskripsi Test'
        ]);

        $found = Catatan::find($catatan->id);

        $this->assertNotNull($found);
        $this->assertEquals($catatan->id, $found->id);
        $this->assertEquals('Judul Test', $found->judul);
    }
}
