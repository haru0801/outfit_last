<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;;

class Review extends Model
{
    
     protected $fillable = [
        'title',
        'body',
        'user_id',
        'post_id'
    ];
    
    use HasFactory;
    
    public function user()
        {
            return $this->belongsTo(User::class);
        }
        
    public function post()
        {
            return $this->belongsTo(Post::class);
        }
}