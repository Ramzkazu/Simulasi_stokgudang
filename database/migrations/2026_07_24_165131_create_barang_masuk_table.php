<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id();

            $table->foreignId('barang_id')
                  ->constrained('barang')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->foreignId('supplier_id')
                  ->constrained('supplier')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->date('tanggal');

            $table->integer('jumlah');

            $table->decimal('harga_beli', 15, 2);

            $table->decimal('total', 15, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuk');
    }
};
