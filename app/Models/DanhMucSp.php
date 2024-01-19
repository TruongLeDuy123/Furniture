<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucSp extends Model
{
    use HasFactory;

    protected $table = 'danhmucsp';

    protected $fillable = [
        'id',
        'TenDM'
    ];

    public function products()
    {
        return $this->hasMany(SanPham::class, 'MaDM', 'id');
    }

}
