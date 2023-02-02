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
        'name',
        'email',
        'password',
        'nickname',
        'description',
        'gender'
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
    ];
    
    public function posts()   
        {
            return $this->hasMany(Post::class);  
        }
        
    public function reviews()   
        {
            return $this->hasMany(Review::class);  
        }
        
    // public function profiles()   
    //     {
    //         return $this->hasOne(Profile::class);  
    //     }
    // フォロワー→フォロー
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follow_users', 'followed_id', 'following_id');
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follow_users', 'following_id', 'followed_id');
    }
    
   public function follow($user_id)
   {
       return $this->follows()->attach($user_id);
   }
 
   public function unfollow($user_id)
   {
       return $this->follows()->detach($user_id);
   }
 
 
   public function isFollowing($user_id)
   {
       return (boolean) $this->follows()->where('followed_id', $user_id)->first();
   }
 
 
   public function isFollowed($user_id)
   {
       return (boolean) $this->followers()->where('following_id', $user_id)->first();
   }
   
  public function getByGender()
    {
         return $this->posts()->with('user')->orderBy('updated_at', 'DESC')->paginate(5);
    }
}