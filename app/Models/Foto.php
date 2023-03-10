<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Foto
 *
 * @property $id
 * @property $foto
 * @property $created_at
 * @property $updated_at
 *
 * @property Propiedade[] $propiedades
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Foto extends Model
{
    
    static $rules = [
		'foto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['foto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function propiedades()
    {
        return $this->hasMany('App\Models\Propiedade', 'foto_id', 'id');
    }
    

}
