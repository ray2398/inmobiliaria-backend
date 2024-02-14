<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'direccion', 'imagen', 'descripcion', 'movimiento', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function movimiento()
    {
        return $this->hasMany(Movimiento::class);
    }
}
