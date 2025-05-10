<?php

namespace App\Models\ServicioAgua;


use App\Models\Direcciones\ComunidadBarrioDireccion;
use App\Models\Residentes\Residente;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $fecha_registro
 * @property int $residente_id
 * @property int $servicio_agua_id
 * @property int $transaccion_id
 * @property int $direccion_id
 * @property int $user_transacciona_id
 * @property string|null $observaciones
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted_at
 * @property-read \App\Models\ServicioAgua\ServicioAgua $servicioAgua
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora whereDireccionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora whereFechaRegistro($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora whereResidenteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora whereServicioAguaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora whereTransaccionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora whereUserTransaccionaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacora withoutTrashed()
 * @mixin \Eloquent
 */
class ServicioAguaBitacora extends Model
{

    use SoftDeletes;
    use HasFactory;

    protected $table = 'servicio_agua_bitacoras';


    protected $fillable = [
            'fecha_registro',
            'residente_id',
            'servicio_agua_id',
            'transaccion_id',
            'direccion_id',
            'user_transacciona_id',
            'observaciones',
        ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
            'id' => 'integer',
            'fecha_registro' => 'datetime',
            'residente_id' => 'integer',
            'servicio_agua_id' => 'integer',
            'transaccion_id' => 'integer',
            'direccion_id' => 'integer',
            'user_transacciona_id' => 'integer',
            'observaciones' => 'string',
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
            'fecha_registro' => 'required|date',
            'residente_id' => 'required|integer',
            'servicio_agua_id' => 'required|integer',
            'transaccion_id' => 'required|integer',
            'direccion_id' => 'required|integer',
            'user_transacciona_id' => 'required|integer',
            'observaciones' => 'nullable|string',
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
    public function direccion()
    {
        return $this->belongsTo(ComunidadBarrioDireccion::class, 'direccion_id', 'id');
    }

    public function residente()
    {
        return $this->belongsTo(Residente::class, 'residente_id', 'id');
    }

    public function servicioAgua()
    {
        return $this->belongsTo(ServicioAgua::class, 'servicio_agua_id', 'id');
    }

    public function tipoTransaccion()
    {
        return $this->belongsTo(ServicioAguaBitacoraTipoTransaccion::class, 'transaccion_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_transacciona_id', 'id');
    }

}
