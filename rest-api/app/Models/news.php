<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description', 'content', 'url', 'image_url', 'published', 'author_id', 'category_id'];

    public function author()
    {
        return $this->belongsTo(authors::class);
    }

    public function category()
    {
        return $this->belongsTo(categories::class);
    }
}
