<?php

namespace App\Models\jobseeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TkUngvien extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_tkungvien';

    protected $fillable = [
        'id_uv',
        'email',
        'ten',
        'ho',
        'matkhau',
        'ngaysinh',
        'gioitinh',
        'sdt',
        'thanhpho',
        'diachi',
        'trangthaitk',
        'maxacnhan',
        'solanxacnhan',
        'hinhanh',
        'nganhnghemm',
        'noilamviecmm',
    ];

    protected $primaryKey = 'id_uv';

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $hidden = [
        'matkhau',
    ];

    public function Hocvan(){
        return $this->hasMany('App\Models\jobseeker\Hocvan', 'id_uv');
    }

    public function Kinhnghiem(){
        return $this->hasMany('App\Models\jobseeker\Kinhnghiem', 'id_uv');
    }

    public function Ngoaingu(){
        return $this->hasMany('App\Models\jobseeker\Ngoaingu', 'id_uv');
    }

    public function CV(){
        return $this->hasMany('App\Models\jobseeker\CV', 'id_uv');
    }

    public function CongviecDaluu(){
        return $this->hasMany('App\Models\jobseeker\CongviecDaluu', 'id_uv');
    }

    public function CongviecBaocao(){
        return $this->hasMany('App\Models\jobseeker\CongviecBaocao', 'id_uv');
    }
}
