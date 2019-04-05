<?php

namespace MyBlog;

use Illuminate\Database\Eloquent\Model;

class PostBlog extends Model
{
    protected $table = 'post_blogs';
    //SELECT p.subject, p.post, p.img_path, p.created_at, p.updated_at, u.name FROM `post_blogs` p INNER join users u WHERE p.user_id = u.id


}
