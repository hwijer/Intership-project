<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyojin\JWT\Traits\HasJWT;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasJWT;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
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

    public function payload(): array 
    {
        // $payload = Parent::payload();\
        return [
            'role' => $this->role_id,
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function isAdmin(): bool
    {
        return $this->role && $this->role->id === 1; // 1 is the ID for 'admin'
    }

    public function isComptable(): bool
    {
        return $this->role && $this->role->id === 2; // 2 is the ID for 'comptable'
    }

    public function isEntrepriseClient(): bool
    {
        return $this->role && $this->role->id === 3; // 3 is the ID for 'entreprise_client'
    }

    public function Admin() 
    {
        return $this->hasOne(Admin::class);
    }

    public function Comptable() 
    {
        return $this->hasOne(Comptable::class);
    }

    public function EntrepriseClient() 
    {
        return $this->hasOne(EntrepriseClient::class);
    }
}
