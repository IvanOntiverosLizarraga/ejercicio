<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['name','autor','categoria'];

    public function categoria()
    {
    	return $this->belongsTo('App\Categoria');
    }

    public function autor()
    {
    	return $this->belongsTo('App\Autor');
    }
}
