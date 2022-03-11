<?php

namespace App\Models\recruiter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;

    protected $table = 'tbl_chitietdonhang';

    protected $fillable = [
        'id_chitietdh',
        'id_dichvu',
        'id_donhang',
        'soluong',
        'dongia',
        'thanhtien',
    ];
    protected $primaryKey = 'id_chitietdh';

    public $timestamps = false;

    public function donhang()
    {
      return $this->belongsTo('App\Models\recruiter\DonHang','id_donhang');
    }
    public function dichvu()
    {
      return $this->belongsTo('App\Models\recruiter\DichVu','id_dichvu');
    }
}
