<?php

namespace App\Models\jobseeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CongviecGoiY extends Model
{
    use HasFactory;

    protected $table = 'tbl_congviecgoiy';

    protected $fillable = [
        'id_goiy',
        'capbac',
        'loaicongviec',
        'nganhnghe',
        'thanhpho',
        'trinhdo',
        'kinhnghiem',
        'mucluong',
        'id_uv',
        'trangthaixem',
        'thoigiantao'
    ];

    protected $primaryKey = 'id_goiy';

    public $timestamps = false;
    public $incrementing = true;    
}
