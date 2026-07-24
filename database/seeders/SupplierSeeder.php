<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'nama_supplier' => 'PT Indocement Tunggal Prakarsa',
                'alamat' => 'Jakarta',
                'no_hp' => '0211111111',
            ],
            [
                'nama_supplier' => 'PT Solusi Bangun Indonesia',
                'alamat' => 'Bogor',
                'no_hp' => '0212222222',
            ],
            [
                'nama_supplier' => 'PT Avia Avian',
                'alamat' => 'Sidoarjo',
                'no_hp' => '0313333333',
            ],
            [
                'nama_supplier' => 'PT Wavin Indonesia',
                'alamat' => 'Tangerang',
                'no_hp' => '0214444444',
            ],
            [
                'nama_supplier' => 'PT Tatalogam Lestari',
                'alamat' => 'Tangerang',
                'no_hp' => '0215555555',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::updateOrCreate(
                ['nama_supplier' => $supplier['nama_supplier']],
                $supplier
            );
        }
    }
}
