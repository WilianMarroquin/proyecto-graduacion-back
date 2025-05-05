<?php

namespace App\Models\Residentes;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property int $estado
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Genero newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Genero newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Genero onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Genero query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Genero whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Genero whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Genero whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Genero whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Genero whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Genero whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Genero whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Genero withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Genero withoutTrashed()
 * @mixin \Eloquent
 */
class Genero extends Model
{

    use SoftDeletes;
    use HasFactory;

    protected $table = 'generos';


    protected $fillable = [
        'nombre',
        'descripcion',
        'estado'
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'estado' => 'integer',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'deleted_at' => 'timestamp',
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:150',
        'descripcion' => 'nullable|string|max:255',
    ];


    /**
     * Custom messages for validation
     *
     * @var array
     */
    public static $messages = [

    ];


    /**
     * Accessor for relationships
     *
     * @var array
     */


}
