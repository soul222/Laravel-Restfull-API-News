<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $Primarykey = ['id'];
    protected $fillable = ['name'];

    public function news()
    {
        return $this->hasMany(news::class);
    }
}
