<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'sanpham';
    protected $fillable = [
        'id',
        'TenSP',
        'NSX',
        'ThuongHieu',
        'Gia',
        'TongSL',
        'HinhAnh',
        'MaDM',
        'ChiTiet'
    ];

    public function cthd_sp()
    {
        return $this->belongsTo(Cthd::class, 'id', 'MaSP');
    }

    public function categories()
    {
        return $this->belongsToMany(DanhMucSp::class);
    }
}
