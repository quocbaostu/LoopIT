<?php

namespace App\Models\jobseeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinhnghiem extends Model
{
    use HasFactory;

    protected $table = 'tbl_kinhnghiem';

    protected $fillable = [
        'id_kinhnghiem',
        'chucdanh',
        'congty',
        'ngaybd',
        'ngaykt',
        'mota',
        'id_uv',
    ];

    protected $primaryKey = 'id_kinhnghiem';

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    public function TkUngvien(){
        return $this->belongsTo('App\Models\jobseeker\TkUngvien', 'id_uv', 'id_uv');
    }
}
