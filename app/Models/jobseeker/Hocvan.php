<?php

namespace App\Models\jobseeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hocvan extends Model
{
    use HasFactory;

    protected $table = 'tbl_hocvan';

    protected $fillable = [
        'id_hocvan',
        'chuyennganh',
        'truong',
        'bangcap',
        'ngaybd',
        'ngaykt',
        'mota',
        'id_uv'
    ];

    protected $primaryKey = 'id_hocvan';

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    public function TkUngvien(){
        return $this->belongsTo('App\Models\jobseeker\TkUngvien', 'id_uv', 'id_uv');
    }
}
