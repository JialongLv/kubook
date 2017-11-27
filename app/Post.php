<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Post extends BaseModel
{

    use Searchable;
    /*
    * 搜索的type
    */
    public function searchableAs()
    {
        return 'posts';
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }

    //关联用户
    public function user(){
        return $this->belongsTo('App\User');
    }

    //关联评论
    public function comments(){
        return $this->hasMany('App\Comment')->
            orderBy('created_at','desc');
    }

    //和用户关联
    public function zan($user_id){
        return $this->hasOne(\App\Zan::class)
            ->where('user_id',$user_id);
    }

    //文章的所有赞
    public function zans(){
        return $this->hasMany(\App\Zan::class);
    }

}
