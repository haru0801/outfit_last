<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Like;



class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'image_url'
    ];
    
    public function user()
        {
            return $this->belongsTo(User::class);
        }
        
    public function reviews()   
        {
            return $this->hasMany(Review::class);  
        }
        
   
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function likedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
}