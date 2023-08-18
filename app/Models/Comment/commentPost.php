<?php

namespace App\Models\Comment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'bool',
    ];
    // protected $casts = [
    //     'bool' => 'integer'
    // ];
    public function comments()
    {
        return $this->hasMany(commentComment::class);
    }
}
