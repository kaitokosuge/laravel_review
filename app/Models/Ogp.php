<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ogp extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'description',
        'url',
    ];
    public function getNewPost()
    {
        return $this->orderBy('updated_at', 'DESC')->get();
    }
}
