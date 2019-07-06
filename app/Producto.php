<?php

namespace Application;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre', 'precio', 'tipo', 'stock', 'descripcion', 'imagen'];
    //
    public function getRouteKeyName() {
        return 'slug';
    }
}
