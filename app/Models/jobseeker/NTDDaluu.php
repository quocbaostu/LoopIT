<?php

namespace App\Models\jobseeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NTDDaluu extends Model
{
    use HasFactory;

    protected $table = 'tbl_ntddaluu';

    protected $fillable = [
        'id_ntddaluu',
        'id_hosontd',
        'id_uv',
        'thoigianluu'
    ];

    protected $primaryKey = 'id_ntddaluu';

    public $timestamps = false;
    public $incrementing = true;
}
