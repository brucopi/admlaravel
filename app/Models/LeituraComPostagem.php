<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeituraComPostagem extends Model
{
    use HasFactory;
    protected $table = 'leituracompostagem';

    protected $fillable = [
        'id', 
        'Data',
        'Hora',
        'Temperatura1',
        'Temperatura2',
        'UmidadeValor',
        'UmidadePorcentagem',
        'MQ137',
        'MQ4',
        'MQ135',
        'MQ7',
        'MAC'
    ];
}
