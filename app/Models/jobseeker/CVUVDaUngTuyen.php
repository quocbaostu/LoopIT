<?php

namespace App\Models\jobseeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CVUVDaUngTuyen extends Model
{
    use HasFactory;

    protected  $table = 'tbl_cvuvdaungtuyen';

    protected $fillable = [
        'id_CVdaut',
        'id_tintd',
        'id_cv',
        'trangthai_danhgia',
        'nhanxet',
        'ngayhenphongvan',
        'thoigiannop'
    ];

    protected $primaryKey = 'id_CVdaut';

    public $timestamps = false;
    public $incrementing = true;

    public function CV(){
        return $this->belongsTo('App\Models\jobseeker\CV', 'id_cv', 'id_cv');
    }
    public function TinTuyenDung(){
        return $this->belongsTo('App\Models\recruiter\TinTuyenDung', 'id_tintd', 'id_tintd');
    }
}
