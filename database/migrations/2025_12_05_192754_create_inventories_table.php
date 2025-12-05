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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Nama barang
            $table->integer('price'); // Harga barang (int)
            $table->integer('quantity'); // Jumlah barang (int)
            $table->date('entry_date'); // Tanggal Masuk
            $table->date('expiry_date'); // Tanggal Kedaluwarsa
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};