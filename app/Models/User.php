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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'is_admin',
        'name',
        'username',
        'bio',
        'image',
        'email',
        'password',
    ];

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

    public function objave() {
        return $this->hasMany(Objava::class)->orderBy("created_at", "DESC"); // relacija jedan na vise, jedan user moze imati vise objava
    }

    public function komentari() {
        return $this->hasMany(Komentar::class)->latest(); // relacija jedan na vise, jedan user moze imati vise komentara
    }

    public function followings() {
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id')->withTimestamps();
        // relacija vise na vise, jedan user moze pratiti vise usera, a i biti pratilac vise usera
    }

    public function followers() {
        return $this->belongsToMany(User::class, 'follower_user', 'user_id', 'follower_id')->withTimestamps();
    }

    public function follows(User $user) {
        return $this->followings()->where('user_id', $user->id)->exists();
    }
    
    public function likes() {
        return $this->belongsToMany(Objava::class, 'post_like', 'user_id', 'objava_id')->withTimestamps();
    }

    public function likesPost(Objava $objava) {
        return $this->likes()->where('objava_id', $objava->id)->exists();
    }

    public function getImageURL() {
        if($this->image) {
            return asset('storage/' . $this->image);
        }
        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}";
    }
}
