<?php

namespace App\Models\ServicioAgua;


use App\Models\Residentes\Residente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property string $correlativo
 * @property int $residente_id
 * @property int $estado_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted_at
 * @property-read \App\Models\ServicioAgua\ServicioAguaEstado $servicioAguaEstado
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAgua newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAgua newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAgua onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAgua query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAgua whereCorrelativo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAgua whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAgua whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAgua whereEstadoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAgua whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAgua whereResidenteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAgua whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAgua withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAgua withoutTrashed()
 * @mixin \Eloquent
 */
class ServicioAgua extends Model
{

    use SoftDeletes;
    use HasFactory;

    protected $table = 'servicio_aguas';


    protected $fillable = [
        'correlativo',
        'residente_id',
        'estado_id'
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'correlativo' => 'string',
        'residente_id' => 'integer',
        'estado_id' => 'integer',
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
        'correlativo' => 'required|string|max:45',
        'residente_id' => 'required|integer',
        'estado_id' => 'required|integer',
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
    public function residente()
    {
        return $this->belongsTo(Residente::class, 'residente_id', 'id');
    }

    public function estado()
    {
        return $this->belongsTo(ServicioAguaEstado::class, 'estado_id', 'id');
    }

//    public function bitacoras()
//    {
//        return $this->hasMany(ServicioAgua::class, 'servicio_agua_id', 'id');
//
//    }

}
