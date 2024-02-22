<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table="komentari";
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sadrzaj'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id'); // relacija vise na jedan, jedan user moze imati vise komentara
    }
}
