<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'judul_buku',
        'penulis',
        'kategori',
        'desc',
        'tahun_terbit',
        'stock',
        'status',
        'status_pinjaman',
    ];

    public function borrow() 
    {
        return $this->hasMany(BorrowBook::class);
    }
}
