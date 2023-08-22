<?php

namespace App\Models\Comment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentReply extends Model
{
    use HasFactory;
    protected $fillable = [
        'reply',
        'comment_post_id',
        'comment_comment_id',
    ];
    public function comment()
    {
        return $this->belongsTo(commentComment::class);
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
