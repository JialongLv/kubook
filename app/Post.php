<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{
    //protected $guarded;     //不可以注入的字段

    //可以注入的字段
//    protected $fillable = ['title','content'];
}
