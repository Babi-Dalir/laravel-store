<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Helpers\ImageManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,  HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'user_name',
        'mobile',
        'email',
        'phone',
        'image',
        'is_admin',
        'whatsapp',
        'telegram',
        'instagram',
        'eita',
        'status',
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

    public static function createUser($request)
    {
        User::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile'=>$request->input('mobile'),
            'password' => Hash::make($request->input('password')),
            'image'=>ImageManager::saveImage('users',$request->image)
        ]);
    }
    public static function updateUser($request,$user)
    {
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile'=>$request->input('mobile'),
            'password' => $request->input('password') ? Hash::make($request->input('password')) : $user->password,
            'image'=>$request->image ? ImageManager::saveImage('users',$request->image) : $user->image
        ]);
    }
}
