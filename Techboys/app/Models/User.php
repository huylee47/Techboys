<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone',
        'wallet',
        'address',
        'gender',
        'dob',
        'role_id',
        'status',
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
    public function checklog(){
        return $this->hasMany(CheckLog::class);
    }
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    public function chats(){
        return $this->hasMany(Chats::class);
    }
    public function messages(){
        return $this->hasMany(Message::class);
    }
    public function blog(){
        return $this->hasMany(Blog::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function bill(){
        return $this->hasMany(Bill::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
