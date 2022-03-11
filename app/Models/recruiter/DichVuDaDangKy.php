<?php

namespace App\Models\recruiter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVuDaDangKy extends Model
{
    use HasFactory;

    protected $table = 'tbl_dichvudadangky';

    protected $fillable = [
        'id_dvdadk',
        'id_ntd',
        'id_dichvu',
        'ngadangky',
        'ngayhethan',
        'trangthai_dvdadk'
    ];
    protected $primaryKey = 'id_dvdadk';

    public $timestamps = false;

    public function taikhoanntd()
    {
      return $this->belongsTo('App\Models\recruiter\TaiKhoanNTD','id_ntd');
    }
    public function dichvu()
    {
      return $this->belongsTo('App\Models\recruiter\DichVu','id_dichvu');
    }
}
