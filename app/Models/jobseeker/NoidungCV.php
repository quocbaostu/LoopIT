<?php

namespace App\Models\jobseeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoidungCV extends Model
{
    use HasFactory;

    protected $table = 'tbl_noidungcv';

    protected $fillable = [
        'id_nd',
        'tieude',
        'chitiet',
        'maucv',
        'mauchu',
        'id_cv'
    ];

    protected $primaryKey = 'id_nd';

    public $timestamps = false;
    public $incrementing = true;
    protected $keyType = 'string';

    public function CV(){
        return $this->belongsTo('App\Models\jobseeker\CV', 'id_cv', 'id_cv');
    }
}
