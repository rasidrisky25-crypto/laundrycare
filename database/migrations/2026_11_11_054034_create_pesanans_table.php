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
    Schema::create('pesanans', function (Blueprint $table) {
        $table->id();
        $table->string('kode_pesanan')->unique();

        $table->foreignId('pelanggan_id')
              ->constrained('pelanggans')
              ->cascadeOnDelete();

        $table->date('tanggal_masuk');
        $table->date('tanggal_selesai')->nullable();
        $table->decimal('berat', 8, 2);
        $table->decimal('total_harga', 12, 2);

        $table->enum('status', [
            'menunggu',
            'diproses',
            'dicuci',
            'disetrika',
            'selesai',
            'diambil'
        ])->default('menunggu');

        $table->text('catatan')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('pesanans');
}
};
