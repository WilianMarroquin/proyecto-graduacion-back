<?php

namespace App\Models\ServicioAgua;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 *
 * @property int $id
 * @property string $nombre
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacoraTipoTransaccion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacoraTipoTransaccion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacoraTipoTransaccion onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacoraTipoTransaccion query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacoraTipoTransaccion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacoraTipoTransaccion whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacoraTipoTransaccion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacoraTipoTransaccion whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacoraTipoTransaccion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacoraTipoTransaccion withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServicioAguaBitacoraTipoTransaccion withoutTrashed()
 * @mixin \Eloquent
 */
class ServicioAguaBitacoraTipoTransaccion extends Model
{

    use SoftDeletes;
    use HasFactory;

    protected $table = 'servicio_agua_bitacora_tipo_transacciones';


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


    /**
     * Accessor for relationships
     *
     * @var array
     */


}
