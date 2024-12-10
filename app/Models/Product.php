<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $foreignkey = 'id_category';

    protected $fillable = [
        'id_category',
        'nama_produk',
        'harga_beli',
        'harga_jual',
        'stok',
        'barcode'
    ];

    
    public function kategori()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }
}
