<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Externa extends Model
{
    use HasFactory;

    public function cuenta()
    {
        return $this->belongsToMany(Cuenta::class);
    }
}
