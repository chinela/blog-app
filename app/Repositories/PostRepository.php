<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct(Post $post)
    {
        parent::__construct($post);
    }

    public function getBySlug($slug)
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }

    public function getUserPosts(int $id)
    {
        return $this->model->where('user_id', $id)->orderBy('created_at')->get();
    }
}
