<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemain extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['nama','tinggi','berat','posisi','nomor_punggung'];
    protected $table = 'pemains';

    public function tim()
    {
        return $this->belongsTo(Tim::class);
    }
}
