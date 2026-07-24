<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = [
            [
                'kategori_id' => 1,
                'kode_barang' => 'BRG001',
                'nama_barang' => 'Semen Tiga Roda 50 Kg',
                'harga_beli' => 55000,
                'harga_jual' => 65000,
                'stok' => 100,
                'satuan' => 'Sak',
            ],
            [
                'kategori_id' => 2,
                'kode_barang' => 'BRG002',
                'nama_barang' => 'Besi Beton 10 mm',
                'harga_beli' => 70000,
                'harga_jual' => 80000,
                'stok' => 75,
                'satuan' => 'Batang',
            ],
            [
                'kategori_id' => 3,
                'kode_barang' => 'BRG003',
                'nama_barang' => 'Cat Avian 5 Kg',
                'harga_beli' => 120000,
                'harga_jual' => 140000,
                'stok' => 40,
                'satuan' => 'Kaleng',
            ],
            [
                'kategori_id' => 4,
                'kode_barang' => 'BRG004',
                'nama_barang' => 'Pipa PVC 3 Inch',
                'harga_beli' => 85000,
                'harga_jual' => 95000,
                'stok' => 60,
                'satuan' => 'Batang',
            ],
            [
                'kategori_id' => 5,
                'kode_barang' => 'BRG005',
                'nama_barang' => 'Keramik 40x40',
                'harga_beli' => 48000,
                'harga_jual' => 55000,
                'stok' => 150,
                'satuan' => 'Dus',
            ],
        ];

        foreach ($barang as $item) {
            Barang::updateOrCreate(
                ['kode_barang' => $item['kode_barang']],
                $item
            );
        }
    }
}
