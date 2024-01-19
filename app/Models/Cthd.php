<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cthd extends Model
{
    use HasFactory;

    protected $table = 'cthd';

    protected $fillable = [
        'id',
        'MaHD',
        'MaSP',
        'SoLuong',
        'DonGia'
    ];

    public function hoadon()
    {
        return $this->belongsTo(HoaDon::class, 'MaHD', 'id');
    }

    public function sanpham(): HasMany
    {
        return $this->hasMany(SanPham::class, 'id', 'MaSP');
    }
}
