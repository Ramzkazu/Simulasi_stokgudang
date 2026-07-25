<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    protected $table = 'supplier';

    protected $fillable = [
    'nama_supplier',
    'alamat',
    'no_hp',
];

    public function barangMasuk(): HasMany
    {
        return $this->hasMany(BarangMasuk::class);
    }
}
