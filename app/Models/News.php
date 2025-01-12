<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'content', 
        'image', 
        'publication_date',
    ];

    public $timestamps = true;

    public function comments()
        {
            return $this->hasMany(Comment::class);
        }


}