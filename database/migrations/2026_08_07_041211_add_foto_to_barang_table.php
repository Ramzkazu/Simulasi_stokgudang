<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom foto ke tabel barang.
     */
    public function up(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('satuan');
        });
    }

    /**
     * Batalkan perubahan jika migration di-rollback.
     */
    public function down(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};
