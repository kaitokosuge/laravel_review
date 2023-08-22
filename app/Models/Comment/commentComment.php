<?php

namespace App\Models\Comment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentComment extends Model
{
    use HasFactory;
    protected $table='comment_comments';
    protected $fillable = [
        'comment',
        'user_id',
        'comment_post_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function replies()
    {
        return $this->hasMany('App\Models\Comment\commentReply');
    }
}
