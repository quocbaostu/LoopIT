<?php

namespace App\Models\jobseeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CongviecBaocao extends Model
{
    use HasFactory;

    protected $table = 'tbl_congviecbaocao';

    protected $fillable = [
        'id_baocao',
        'noidung_baocao',
        'ngaybaocao',
        'id_uv',
        'id_tintd'
    ];

    protected $primaryKey = 'id_baocao';

    public $timestamps = false;
    public $incrementing = true;

    public function TkUngvien(){
        return $this->belongsTo('App\Models\jobseeker\TkUngvien', 'id_uv', 'id_uv');
    }
    public function TinTuyenDung(){
        return $this->belongsTo('App\Models\recruiter\TinTuyenDung', 'id_tintd', 'id_tintd');
    }
}
