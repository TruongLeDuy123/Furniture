<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HoaDon extends Model
{
    use HasFactory;

    protected $table = 'hoadon';

    protected $fillable = [
        'id',
        'TTDH',
        'TTTT',
        'MaKH',
        'MaNV',
        'NgayHD',
        'NgayGH',
        'SDT',
        'DiaChi',
        'ThanhPho',
        'MaKM',
        'TriGia'
    ];

    public function CTHD(): HasMany
    {
        return $this->hasMany(Cthd::class, 'MaHD', 'id');
    }
}
