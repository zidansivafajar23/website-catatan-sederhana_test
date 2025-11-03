<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Catatan
 * Dibuat oleh: RAFIF
 */
class Catatan extends Model
{
    protected $table = 'catatan';
    
    protected $fillable = [
        'judul',
        'deskripsi'
    ];
}
