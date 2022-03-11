<?php

namespace App\Models\recruiter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoSoNTD extends Model
{
    use HasFactory;

    protected $table = 'tbl_hosontd';

    protected $fillable = [
        'id_hosontd',
        'tencty',
        'diachicty',
        'thanhpho',
        'quymo',
        'linhvuchd',
        'phucloi',
        'mota',
        'logo',
        'website',
        'id_ntd'
    ];
    protected $primaryKey = 'id_hosontd';

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    public function taikhoanntd(){
        return $this->belongsTo('App\Models\recruiter\TaiKhoanNTD','id_ntd');
    }

}
