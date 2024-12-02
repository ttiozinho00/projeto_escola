<?php
/*app/models/Usuario.php*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    /**
     * Campos preenchíveis no banco de dados.
     */
    protected $fillable = [
        'nome',
        'email',
        'senha',
    ];

    /**
     * Oculta campos sensíveis.
     */
    protected $hidden = [
        'senha',
    ];
}

