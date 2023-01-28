<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use SoftDeletes;
    
     protected $fillable = [
        'stars',
        'comment',
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