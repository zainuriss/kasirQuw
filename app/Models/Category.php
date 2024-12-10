<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $table = 'categories';
    protected $fillable = [
        'nama_kategori',
    ];

    public function produk()
    {
        return $this->hasMany(Product::class);
    }
}
