<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'unique_id', 'name', 'email', 'phone', 'role_id'
    ];
    
    public function role()
    {
        return $this->belongsTo(Role_type::class, 'role_id', 'id');
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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public static function getdata() {
        return self::all();
    }

    public static function storeUser($data)
    {
        $role = Role_type::where('name', $data['role_id'])->first();

        return self::create([
            // 'unique_id' => Str::uuid(), 
            'unique_id' => uniqid(),
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'role_id' => $data['role_id'], 
        ]);
    }   

    public static function editUser($id)
    {
        return self::findOrFail($id);
    }

    public static function updateUser($id, $data)
    {
        return self::where('id', $id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'role_id' => $data['role_id'],
        ]);
    }
    

}
