<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Propiedade
 *
 * @property $id
 * @property $precio_uf
 * @property $contacto
 * @property $telefono
 * @property $direccion
 * @property $descripcion
 * @property $categoria_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Foto $fotos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Propiedade extends Model
{
    
    static $rules = [
		'precio_uf' => 'required',
		'contacto' => 'required',
		'telefono' => 'required',
		'direccion' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['precio_uf','contacto','telefono','direccion','descripcion','categoria_id','foto_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fotos()
    {
       return $this->hasOne('App\Models\Foto', 'id', 'foto_id');
    }
    

}
