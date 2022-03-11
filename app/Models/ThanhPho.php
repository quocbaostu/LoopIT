<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanhPho extends Model
{
    use HasFactory;

    protected $table ='tbl_thanhpho';

    protected $fillable = [
        'id_tp',
        'tentp'
    ];

    protected $primaryKey = 'id_tp';
    public $timestamps = false;
}
