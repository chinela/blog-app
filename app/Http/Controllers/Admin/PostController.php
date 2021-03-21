<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\PostRepositoryInterface;

class PostController extends Controller
{
    public function __construct(PostRepositoryInterface $post, CategoryRepositoryInterface $category)
    {
        $this->postRepository = $post;
        $this->categoryRepository = $category;
    }

    public function index()
    {
        $title = 'All Posts';
        $posts = $this->postRepository->getAllByOrder('created_at', 'desc')->load('user', 'category');

        return view('admin.dashboard', compact('title', 'posts'));
    }

    public function delete(Request $request)
    {
        $post = $this->postRepository->getBySlug($request->input('slug'));
        $post->delete();
        $request->session()->flash('success', 'Post deleted successfully');
        return redirect()->back();
    }

    public function edit($slug)
    {
        $title =  'Edit Post';
        $categories = $this->categoryRepository->getAllByOrder('name');
        $post = $this->postRepository->getBySlug($slug)->load('category', 'user');

        return view('admin.posts.edit', compact('title', 'post', 'categories'));
    }

    public function update(Request $request, $slug)
    {
        $post = $this->postRepository->getBySlug($slug);
        if ($request->hasFile('image')) {
            $this->validatePostRequest($request, ['image' => 'required|image|mimes:png,jpg,lpeg']);
            $this->deleteImage($post->image);
            $image = $this->uploadImage($request->file('image'));
        } else {
            $this->validatePostRequest($request);
            $image = $post->image;
        }

        $data = $request->only(['title', 'description', 'category_id']);
        $data['image'] = $image;
        $postUpdate = $this->postRepository->update($post->id, $data);
        $request->session()->flash('success', 'Post updated successfully');

        return redirect()->route('admin.post.edit', ['slug' => $postUpdate->slug]);
    }
}
