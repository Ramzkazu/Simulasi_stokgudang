<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            'Semen',
            'Besi',
            'Cat',
            'Pipa',
            'Keramik',
            'Kayu',
            'Atap',
            'Perkakas',
        ];

        foreach ($kategori as $item) {
            Kategori::updateOrCreate(
                ['nama_kategori' => $item],
                ['nama_kategori' => $item]
            );
        }
    }
}
