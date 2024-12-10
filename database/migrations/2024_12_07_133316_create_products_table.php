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
        
        Schema::create('products', function (Blueprint $table) {
            $table->id()->primary();
            // $table->bigInteger('id_category');
            $table->string('nama_produk');
            $table->decimal('harga_beli', 8, 2);
            $table->decimal('harga_jual', 8, 2);
            $table->smallInteger('stok');
            $table->string('barcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
