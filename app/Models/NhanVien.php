<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhanvien';

    protected $fillable = [
        'id',
        'HoTen',
        'Email',
        'SDT',
        'DiaChi',
        'ThanhPho',
        'GioiTinh',
        'google_id',
    ];
}
