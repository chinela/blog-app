<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(CategoryRepositoryInterface $category, PostRepositoryInterface $post)
    {
        $this->categoryRepository = $category;
        $this->postRepository = $post;
    }
    public function index()
    {
        $title = 'Homepage';
        $posts = $this->postRepository->getAllByOrder('created_at', 'DESC')->load('user.role', 'category');

        return view('posts.index', compact('title', 'posts'));
    }

    public function create()
    {
        $title = 'Create New Post';
        $categories = $this->categoryRepository->getAllByOrder('name');

        return view('posts.create', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validatePostRequest($request, ['image' => 'required|image|mimes:png,jpg,lpeg']);
        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request->file('image'));
        $data['user_id'] = auth()->user()->id;
        $post = $this->postRepository->create($data);

        $request->session()->flash('success', 'You post has been published');
        return redirect()->route('post.show', ['slug' => $post->slug]);
    }

    public function show($slug)
    {
        $post = $this->postRepository->getBySlug($slug)->load('category', 'user');
        $title =  $post->title;

        return view('posts.show', compact('title', 'post'));
    }

    public function userPosts()
    {
        $user = auth()->user();
        $title = 'Your posts';
        $posts = $this->postRepository->getUserPosts($user->id);

        return view('posts.user_posts', compact('title', 'posts'));
    }

    public function edit($slug)
    {
        $title =  'Edit Post';
        $categories = $this->categoryRepository->getAllByOrder('name');
        $post = $this->postRepository->getBySlug($slug)->load('category', 'user');

        return view('posts.edit', compact('title', 'post', 'categories'));
    }

    public function update(Request $request, $slug)
    {
        $post = $this->postRepository->getBySlug($slug);

        // TODO::move into post services 

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

        return redirect()->route('post.show', ['slug' => $postUpdate->slug]);
    }

    public function delete(Request $request, $slug)
    {
        $post = $this->postRepository->getBySlug($slug);
        if ($post->user_id == auth()->user()->id) {
            $post->delete();
            $request->session()->flash('success', 'Post deleted successfully');
            return redirect()->route('post.user.post');
        }

        abort(401);
    }
}
