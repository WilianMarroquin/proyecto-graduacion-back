<?php

namespace App\Models\Direcciones;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 *
 * @property int $id
 * @property string $direccion
 * @property int $barrio_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted_at
 * @property-read \App\Models\Direcciones\ComunidadBarrio $comunidadBarrio
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ComunidadBarrioDireccion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ComunidadBarrioDireccion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ComunidadBarrioDireccion onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ComunidadBarrioDireccion query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ComunidadBarrioDireccion whereBarrioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ComunidadBarrioDireccion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ComunidadBarrioDireccion whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ComunidadBarrioDireccion whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ComunidadBarrioDireccion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ComunidadBarrioDireccion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ComunidadBarrioDireccion withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ComunidadBarrioDireccion withoutTrashed()
 * @mixin \Eloquent
 */
class ComunidadBarrioDireccion extends Model
{

    use SoftDeletes;
    use HasFactory;

    protected $table = 'comunidad_barrio_direcciones';


    protected $fillable = [
        'direccion',
        'barrio_id'
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'direccion' => 'string',
        'barrio_id' => 'integer',
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
        'direccion' => 'required|string|max:255',
        'barrio_id' => 'required|integer',
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
    public function barrio()
    {
        return $this->belongsTo(ComunidadBarrio::class, 'barrio_id', 'id');
    }

}
