<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class LoaiNganhNghe extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_loainganhnghe';

    protected $fillable = [
        'id_lnn',
        'tenloainn'
    ];
    protected $primaryKey = 'id_lnn';

    public $timestamps = false;
    public $incrementing = true;
    protected $keyType = 'string';

}
