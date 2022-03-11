<?php

namespace App\Models\recruiter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    use HasFactory;

    protected $table = 'tbl_dichvu';

    protected $fillable = [
        'id_dichvu',
        'tendv',
        'giadv',
        'motadv',
        'loaidv',
        'songayhieuluc',
        'diemtk'
    ];
    protected $primaryKey = 'id_dichvu';

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    public function dichvudadangkys()
    {
        return $this->hasMany('App\Models\recruiter\DichVuDaDangKy', 'id_dvdadk');
    }
    public function chitietdonhangs()
    {
        return $this->hasMany('App\Models\recruiter\ChiTietDonHang', 'id_chitietdh');
    }

}
