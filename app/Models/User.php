<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        "is_volunteer",
        'is_sponsor',
        'status',
        'phone',
        'age',
        'address',
        'verified_token',
        'avatar',
        'deleted_at'
    ];

    public function comments(){
        return $this->hasMany(CommentPost::class, 'user_id', 'id');
    }
    public function roles(){
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
    

    public function checkPermissionAccess($permissionCheck){
        $roles = auth()->user()->roles;
        
        foreach ($roles as $role) {
            $permissions = $role->permissions;
            
            if($permissions->contains('key_code', $permissionCheck)){
                return true;
            }
        }
        return false;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function donateinfo(){
        return $this->hasMany(DonateInfo::class, 'user_id');
    }
}
