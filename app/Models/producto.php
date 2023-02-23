<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    // Instancio la tabla 'productos'
    protected $table = 'productos'; //Luego puedo usar la tabla con $productos

    // Declaro los campos que usaré de la tabla 'productos'
    protected $fillable = ['nombre', 'precio', 'stock', 'img'];
}
