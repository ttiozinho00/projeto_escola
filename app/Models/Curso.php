<?php
/*app/models/Curso.php*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'duracao'];

    
    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }
}