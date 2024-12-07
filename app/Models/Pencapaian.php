<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencapaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelurahan_id',
        'indikator_id',
        'target_2023',
        'pencapaian_2023',
        'target_2024',
        'pencapaian_2024'
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }
}
