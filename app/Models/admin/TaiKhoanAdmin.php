<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoanAdmin extends Model
{
    use HasFactory;

    protected $table = 'tbl_tkquantrivien';

    protected $fillable = [
        'id_qtv',
        'tenqtv',
        'email',
        'matkhau',
        'sdt',
        'ngaysinh',
        'gioitinh',
        'ngayvaolam',
        'hinhanh',
        'id_chucvu'
    ];
    protected $primaryKey = 'id_qtv';

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $hidden = [
        'matkhau',
        'sdt',
    ];

    public function chucvu()
    {
      return $this->belongsTo('App\Models\admin\ChucVu','id_chucvu');
    }
}
