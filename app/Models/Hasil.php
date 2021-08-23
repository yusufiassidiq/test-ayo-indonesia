<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hasil extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [''];
    protected $table = 'hasils';

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function pencetak_gol()
    {
        return $this->hasMany(Pencetak_Gol::class);
    }
}
