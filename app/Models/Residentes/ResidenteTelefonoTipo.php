<?php

namespace App\Models\Residentes;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property string $nombre
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefonoTipo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefonoTipo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefonoTipo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefonoTipo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefonoTipo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefonoTipo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefonoTipo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefonoTipo whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefonoTipo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefonoTipo withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefonoTipo withoutTrashed()
 * @mixin \Eloquent
 */
class ResidenteTelefonoTipo extends Model
{

    use SoftDeletes;
    use HasFactory;

    protected $table = 'residente_telefono_tipos';


    protected $fillable =
        [
    'nombre'
];

    const CASA = 1;
    const CELULAR = 2;
    const TRABAJO = 3;
    const OTRO = 4;



    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts =
        [
        'id' => 'integer',
        'nombre' => 'string',
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
    'nombre' => 'required|string|max:150',
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


}
