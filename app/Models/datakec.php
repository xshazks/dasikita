<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datakec extends Model
{
    use HasFactory;

    protected $fillable = [
        'kecamatan_id',
        'indikator_id',
        'target_2023',
        'pencapaian_2023',
        'target_2024',
        'pencapaian_2024'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class);
    }

    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }
}
