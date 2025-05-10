<?php

namespace App\Models\ServicioAgua;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $nombre
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaEstado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaEstado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaEstado onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaEstado query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaEstado whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaEstado whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaEstado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaEstado whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaEstado whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaEstado withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaEstado withoutTrashed()
 * @mixin \Eloquent
 */
class ServicioAguaEstado extends Model
{

    use SoftDeletes;
    use HasFactory;

    protected $table = 'servicio_agua_estados';


    protected $fillable = [
        'nombre'
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
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
    public static $rules = [
        'nombre' => 'required|string|max:100',
    ];


    /**
     * Custom messages for validation
     *
     * @var array
     */
    public static $messages = [

    ];

    const ACTIVA = 1;
    const SUSPENDIDA = 2;
    const REACTIVADA = 3;
    const CANCELADA = 4;

    /**
     * Accessor for relationships
     *
     * @var array
     */


}
