<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $hidden = [
        'user_id',
        'user_uuid',
    ];

    protected $fillable = [
        'user_uuid',
        'title',
        'description',
        'eyecatch',
        'body',
        'published_at',
    ];

    // Userとのリレーション
    public function user()
 
   
   
    {
        return $this->belongsTo(User::class);
    }
}
