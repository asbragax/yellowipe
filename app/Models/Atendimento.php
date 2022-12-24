<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'medico_id',
        'paciente_id',
        'date',
        'time',
        'description',
    ];

    protected $casts = [
        'date' => 'datetime',
        'time' => 'datetime',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
}
