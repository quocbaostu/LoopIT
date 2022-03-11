<?php

namespace App\Models\jobseeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CV extends Model
{
    use HasFactory;

    protected $table = 'tbl_cv';

    protected $fillable = [
        'id_cv',
        'tieudecv',
        'tenfile',
        'trangthaicv',
        'maucv',
        'mauchu_lh',
        'mauchu_nd',
        'loaicv',
        'thoigiancapnhat',
        'chucdanhht',
        'capbacht',
        'sonamkn',
        'mucluongmm',
        'thetukhoa',
        'hinhdaidien',
        'id_uv',
    ];

    protected $primaryKey = 'id_cv';

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    public function TkUngvien(){
        return $this->belongsTo('App\Models\jobseeker\TkUngvien', 'id_uv', 'id_uv');
    }

    public function NoidungCV(){
        return $this->hasMany('App\Models\jobseeker\NoidungCV', 'id_cv');
    }

    public function CVUVDaUngTuyen(){
        return $this->hasMany('App\Models\jobseeker\CVUVDaUngTuyen', 'id_cv');
    }
}
