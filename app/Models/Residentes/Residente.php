<?php

namespace App\Models\Residentes;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * 
 *
 * @property int $id
 * @property string $primer_nombre
 * @property string|null $segundo_nombre
 * @property string|null $tercer_nombre
 * @property string $primer_apellido
 * @property string|null $segundo_apellido
 * @property string|null $apellido_casada
 * @property string $dpi
 * @property \Illuminate\Support\Carbon|null $fecha_nacimiento
 * @property int $direccion_id
 * @property int $genero_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted_at
 * @property-read \App\Models\Residentes\Genero $genero
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente whereApellidoCasada($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente whereDireccionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente whereDpi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente whereFechaNacimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente whereGeneroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente wherePrimerApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente wherePrimerNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente whereSegundoApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente whereSegundoNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente whereTercerNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Residente withoutTrashed()
 * @mixin \Eloquent
 */
class Residente extends Model
{

    use SoftDeletes;
    use HasFactory;

    protected $table = 'residentes';


    protected $fillable =
        [
    'primer_nombre',
    'segundo_nombre',
    'tercer_nombre',
    'primer_apellido',
    'segundo_apellido',
    'apellido_casada',
    'dpi',
    'fecha_nacimiento',
    'direccion_id',
    'genero_id'
];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts =
        [
        'id' => 'integer',
        'primer_nombre' => 'string',
        'segundo_nombre' => 'string',
        'tercer_nombre' => 'string',
        'primer_apellido' => 'string',
        'segundo_apellido' => 'string',
        'apellido_casada' => 'string',
        'dpi' => 'string',
        'fecha_nacimiento' => 'date',
        'direccion_id' => 'integer',
        'genero_id' => 'integer',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'deleted_at' => 'timestamp',
    ];



    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules =
    [
    'primer_nombre' => 'required|string|max:100',
    'segundo_nombre' => 'nullable|string|max:100',
    'tercer_nombre' => 'nullable|string|max:100',
    'primer_apellido' => 'required|string|max:100',
    'segundo_apellido' => 'nullable|string|max:100',
    'apellido_casada' => 'nullable|string|max:100',
    'dpi' => 'required|string|max:14',
    'fecha_nacimiento' => 'nullable|date',
    'direccion_id' => 'required|integer',
    'genero_id' => 'required|integer',
];


    /**
     * Custom messages for validation
     *
     * @var array
     */
    public static $messages =[

    ];


    /**
     * Accessor for relationships
     *
     * @var array
     */
    public function comunidadBarrioDireccione()
    {
    return $this->belongsTo(ComunidadBarrioDireccione::class,'direccion_id','id');
    }

    public function genero()
    {
    return $this->belongsTo(Genero::class,'genero_id','id');
    }

}
