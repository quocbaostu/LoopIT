<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nganhnghe extends Model
{
    use HasFactory;

    protected $table = 'tbl_nganhnghe';

    protected $fillable = [
        'id_nganhnghe',
        'tennganhnghe'
    ];

    protected $primaryKey = 'id_nganhnghe';

    public $timestamps = false;
    public $incrementing = true;
    protected $keyType = 'string';
}
