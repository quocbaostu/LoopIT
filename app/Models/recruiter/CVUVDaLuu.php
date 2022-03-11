<?php

namespace App\Models\recruiter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CVUVDaLuu extends Model
{
    use HasFactory;

    protected  $table = 'tbl_cvuvdaluu';

    protected $fillable = [
        'id_CVdaluu',
        'id_ntd',
        'id_cv',
        'trangthai_cvdaluu',
    ];

    protected $primaryKey = 'id_CVdaluu';

    public $timestamps = false;
    public $incrementing = true;

    public function cv(){
        return $this->belongsTo('App\Models\jobseeker\CV', 'id_cv', 'id_cv');
    }
    public function taikhoanntd()
    {
      return $this->belongsTo('App\Models\recruiter\TaiKhoanNTD','id_ntd');
    }
}
