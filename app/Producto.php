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

    //Query Scopes
	public function scopeNombre($query, $nombre)
	{
		if ($nombre)
			return $query->where('nombre','LIKE',"%$nombre%");
	}
	public function scopeEstado($query)
	{
		return $query->where('estado','activo');
	}
}
