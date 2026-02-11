<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'diagnostico',
        'data_atendimento',
        'tratamento',
        'observacoes'
    ];
}

