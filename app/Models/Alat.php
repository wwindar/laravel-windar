<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alats';
    protected $fillable = ['nama_alat', 'tahun', 'merek', 'lokasi'];

    /**
     * Appended attributes for API compatibility.
     */
    protected $appends = ['nama', 'kategori'];

    public function getNamaAttribute(): ?string
    {
        return $this->attributes['nama_alat'] ?? null;
    }

    public function getKategoriAttribute(): ?string
    {
        return $this->attributes['merek'] ?? null;
    }
}