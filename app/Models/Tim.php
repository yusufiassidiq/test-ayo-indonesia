<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tim extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['nama','logo','tahun_berdiri','alamat','kota'];
    protected $table = 'tims';
    protected $dates = ['deleted_at'];

    public function pemain()
    {
        return $this->hasMany(Pemain::class);
    }
}
