<?php

namespace App\Models;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Bookmark;
use App\Models\Notification;
use App\Models\Post; // Ensure this class exists in the specified namespace


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_pic',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 📌 Relationships

    /**
     * Get all posts by the user.
     */
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get all comments made by the user.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all likes made by the user.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Get all bookmarks by the user.
     */
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    /**
     * Get all notifications for the user.
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
