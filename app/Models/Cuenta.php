<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    // Relación de muchos a muchos
    public function externas()
    {
        return $this->belongsToMany(Externa::class);
    }

    // Relación de 1 a muchos de Cuentas a Propias
    public function transferencia()
    {
        return $this->hasMany(Transferencia::class);
    }
}
