<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokterParamedik extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto',
        'nama',
        'spesialis',
        'domisili',
        'nomor_str',
        'nomor_whatsapp',
    ];
    protected $table = 'dokter_paramediks';
    

    Public function domisiliId(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'domisili', 'id');
    }
}
