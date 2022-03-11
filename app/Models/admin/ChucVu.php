<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;
    protected $table = 'tbl_chucvu';

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $primaryKey = 'id_chucvu';
    protected $fillable = [
        'id_chucvu',
        'tenchucvu',
    ];
    public function taikhoanadmins()
    {
        return $this->hasMany('App\Models\admin\TaiKhoanAdmin', 'id_chucvu');
    }
}
