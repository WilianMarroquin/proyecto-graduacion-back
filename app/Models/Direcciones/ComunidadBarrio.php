<?php

namespace App\Models\Direcciones;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComunidadBarrio extends Model
{

    use SoftDeletes;
    use HasFactory;

    protected $table = 'comunidad_barrios';


    protected $fillable = [
        'nombre',
        'comunidad_id'
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'comunidad_id' => 'integer',
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
        'nombre' => 'required|string|max:255',
        'comunidad_id' => 'required|integer',
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
    public function comunidad()
    {
        return $this->belongsTo(Comunidad::class, 'comunidad_id', 'id');
    }

}
