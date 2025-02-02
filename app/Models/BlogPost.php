<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public $table = 'blog_posts';
    public function tags()
{
    return $this->hasMany(PostTags::class, 'post_id', 'id');
}
}
