<?php

namespace App\Models\Like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likeLike extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id',
    ];
}
