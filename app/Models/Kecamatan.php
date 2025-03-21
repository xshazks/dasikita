<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class kecamatan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kecamatan'];

    public function kecamatan()
    {
        return $this->hasMany(kecamatan::class);
    }
}
