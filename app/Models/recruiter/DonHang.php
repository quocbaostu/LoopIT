<?php

namespace App\Models\recruiter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'tbl_donhang';

    protected $fillable = [
        'id_donhang',
        'ngaymua',
        'hinhthucthanhtoan',
        'trangthaidh',
        'qtv',
        'id_ntd'
    ];
    protected $primaryKey = 'id_donhang';

    public $timestamps = false;
    


    public function taikhoanntd()
    {
      return $this->belongsTo('App\Models\recruiter\TaiKhoanNTD','id_ntd');
    }
    public function chitietdonhangs()
    {
        return $this->hasMany('App\Models\recruiter\ChiTietDonHang', 'id_chitietdh');
    }
}
