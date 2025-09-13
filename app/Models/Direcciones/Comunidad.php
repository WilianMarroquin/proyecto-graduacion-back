<?php

namespace App\Models\Direcciones;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $nombre
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comunidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comunidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comunidad onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comunidad query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comunidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comunidad whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comunidad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comunidad whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comunidad whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comunidad withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comunidad withoutTrashed()
 * @mixin \Eloquent
 */
class Comunidad extends Model
{

    use SoftDeletes;
    use HasFactory;

    protected $table = 'comunidades';


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

    const COMUNIDAD_NARANJO = 1;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
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

    public function barrios(): hasMany
    {
        return $this->hasMany(ComunidadBarrio::class, 'comunidad_id', 'id');
    }

}
