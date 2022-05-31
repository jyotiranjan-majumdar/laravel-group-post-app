<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'body'
    ];

    public function likeBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function ownedby(User $user)
    {
        return $user->id === $this->user_id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasmany(Like::class);
    }
}
