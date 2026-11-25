<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matriculas';

    protected $fillable = [
        'estudiante',
        'identificacion',
        'curso_id',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
