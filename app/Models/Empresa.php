<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'email', 'logotipo', 'sitio_web'];

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'empresa_id', 'id');
    }
}
