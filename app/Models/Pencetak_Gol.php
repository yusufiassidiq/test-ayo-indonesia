<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pencetak_Gol extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['waktu_gol','id_pencetak_gol'];
    protected $table = 'pencetak__gols';

    public function hasil()
    {
        return $this->belongsTo(Hasil::class);
    }
}
