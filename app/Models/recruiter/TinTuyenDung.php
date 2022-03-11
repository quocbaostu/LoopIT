<?php

namespace App\Models\recruiter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuyenDung extends Model
{
    use HasFactory;

    protected $table = 'tbl_tintuyendung';

    protected $fillable = [
        'id_tintd',
        'tencongviec',
        'capbac',
        'loaicongviec',
        'nganhnghe',
        'diadiemlamviec',
        'thanhpho',
        'trinhdo',
        'kinhnghiem',
        'mucluong_toithieu',
        'mucluong_toida',
        'motacongviec',
        'yeucaucongviec',
        'quyenloi',
        'ngaydangtin',
        'ngayhethan',
        'dichvuhotro',
        'trangthai_tintd',
        'id_ntd'
    ];
    protected $primaryKey = 'id_tintd';

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    


    public function taikhoanntd()
    {
      return $this->belongsTo('App\Models\recruiter\TaiKhoanNTD','id_ntd');
    }
}
