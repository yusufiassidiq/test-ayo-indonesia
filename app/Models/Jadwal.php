<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['tanggal','waktu','id_home','id_away'];
    protected $table = 'jadwals';

    public function hasil()
    {
        return $this->hasOne(Hasil::class);
    }
}
