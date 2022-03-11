<?php

namespace App\Models\recruiter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TaiKhoanNTD extends  Model
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_tknhatuyendung';

    protected $fillable = [
        'id_ntd',
        'tennlh',
        'email',
        'matkhau',
        'sdt',
        'trangthaitk',
        'diem_tkuv',
        'verify_email',
    ];
    protected $primaryKey = 'id_ntd';

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $hidden = [
        'matkhau',
        'sdt',
    ];

    public function hosontd()
    {
        return $this->hasOne('App\Models\recruiter\HoSoNTD', 'id_ntd','id_ntd');
    }
    public function donhangs()
    {
        return $this->hasMany('App\Models\recruiter\DonHang', 'id_donhang');
    }
    public function dichvudadangkys()
    {
        return $this->hasMany('App\Models\recruiter\DichVuDaDangKy', 'id_dvdadk');
    }
    public function tintuyendungs()
    {
        return $this->hasMany('App\Models\recruiter\TinTuyenDung', 'id_tintd');
    }
}
