<?php

namespace App\Models\jobseeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ngoaingu extends Model
{
    protected $table = 'tbl_ngoaingu';

    protected $fillable = [
        'id_ngoaingu',
        'tenngoaingu',
        'mucdo',
        'id_uv',
    ];

    protected $primaryKey = 'id_ngoaingu';

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    public function TkUngvien(){
        return $this->belongsTo('App\Models\jobseeker\TkUngvien', 'id_uv', 'id_uv');
    }
}
