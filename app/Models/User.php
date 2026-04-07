<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'profilePic',
        'role_id',
        'phone',
        'status',
        'token',
        'description',
        'motdepasse'
    ];

    protected $hidden = [
        'password',
        'token',
        // legacy column (should not be exposed even if present in DB)
        'motdepasse',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleAttribute(){

        $c = Role::find($this->role_id);
        return $c->slug;
    }

    public function factures(){
        return $this->hasMany(Facture::class);
    }

    public function expenses(){
        return $this->hasMany(Expense::class);
    }

    public function isAdmin()
    {
        return in_array($this->role, ['admin', 'superuser']); // adaptez selon vos rôles exacts
    }
}
