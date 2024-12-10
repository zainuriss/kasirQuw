<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'nama_produk' => $row['A'],
            'barcode' => $row['B'],
            'harga_beli' => (float) str_replace(['Rp', '.', ' '], '', $row['C']),
            'harga_jual' => (float) str_replace(['Rp', '.', ' '], '', $row['D']),
            'stok' => (int) $row['E'],
            'id_category' => (int) $row['F'], // Pastikan ada kolom id_category di template Excel
        ]);
    }
}
