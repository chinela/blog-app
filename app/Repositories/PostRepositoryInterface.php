<?php

namespace App\Repositories;

interface PostRepositoryInterface
{
    public function getBySlug($slug);

    public function getUserPosts(int $id);
}
