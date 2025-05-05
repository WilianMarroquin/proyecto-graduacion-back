<?php

namespace App\Models\Residentes;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 *
 * @property int $id
 * @property string $telefono
 * @property int $residente_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefono newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefono newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefono onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefono query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefono whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefono whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefono whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefono whereResidenteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefono whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefono whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefono withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResidenteTelefono withoutTrashed()
 * @mixin \Eloquent
 */
class ResidenteTelefono extends Model
{

    use SoftDeletes;
    use HasFactory;

    protected $table = 'residente_telefonos';


    protected $fillable = [
        'telefono',
        'residente_id'
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'telefono' => 'string',
        'residente_id' => 'integer',
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
        'telefono' => 'required|string|max:13',
        'residente_id' => 'required|integer',
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

}
