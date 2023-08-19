<?php

namespace App\Models\Comment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentPost extends Model
{
    use HasFactory;
    protected $table='comment_posts';
    protected $fillable = [
        'title',
        'bool',
    ];
    public function comments()
    {
        return $this->hasMany(commentComment::class);
    }
}
