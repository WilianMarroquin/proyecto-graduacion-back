<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre_usuario',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Devolver al usuario autenticado, sus roles y permisos.
     *
     * @return User
     */
    public function responseUser(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->primer_nombre,
            'email' => $this->primer_apellido,
            'roles' => $this->getRoleNames(),
            'permisos' => $this->getAllPermissions()->map(function ($permission) {
                return [
                    'accion' => $permission->name, // Acción que el usuario puede realizar
                    'recurso' => $permission->subject // Puedes cambiar esto por el recurso correcto
                ];
            })->toArray(),
        ];
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('Super Admin');

    }


}
