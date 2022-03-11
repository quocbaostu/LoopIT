<?php

namespace App\Models\jobseeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CongviecDaluu extends Model
{
    use HasFactory;

    protected $table = 'tbl_congviecdaluu';

    protected $fillable = [
        'id_cvdaluu',
        'id_tintd',
        'id_uv'
    ];

    protected $primaryKey = 'id_cvdaluu';

    public $timestamps = false;
    public $incrementing = true;

    public function TkUngvien(){
        return $this->belongsTo('App\Models\jobseeker\TkUngvien', 'id_uv', 'id_uv');
    }
    public function TinTuyenDung(){
        return $this->belongsTo('App\Models\recruiter\TinTuyenDung', 'id_tintd', 'id_tintd');
    }
}
