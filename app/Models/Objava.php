<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objava extends Model
{
    protected $table="objave";
    use HasFactory;

    protected $fillable = [
        'user_id',
        'objava',
        'image',
        'headline'
    ];

    public function komentari() {
        return $this->hasMany(Komentar::class, 'objava_id', 'id'); // relacija jedan na vise, jedna objava moze imati vise komentara
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id'); // relacija vise na jedan, jedan user moze imati vise objava
    }

    public function getImageURL() {
        if($this->image) {
            return asset('storage/' . $this->image);
        }
    }

    public function likes() {
        return $this->belongsToMany(User::class, 'post_like', 'objava_id', 'user_id')->withTimestamps();
    }
}
