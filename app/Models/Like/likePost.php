<?php

namespace App\Models\Like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likePost extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];
    public function likes()
    {
        return $this->hasMany(likeLike::class);
    }
    public function is_liked_by_user()
    {
        $id = \Auth::id();
        $likers = [];
        //$likeには$thisに紐づいたlikesテーブルのレコードひとつひとつが入るようになる
        foreach($this->likes as $like){
            //配列$likersにlikesテーブルのユーザーidを格納
            array_push($likers , $like->user_id);
        }
        //配列$likersに$id(いいねbtnを押そうとしている人のid)があるかどうかで条件式を作る
        if(in_array($id, $likers)){
            return true;
        } else {
            return false;
        }
    }
}
