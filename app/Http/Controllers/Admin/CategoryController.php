<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->categoryRepository = $category;
    }

    public function index()
    {
        $title = 'All Categories';
        $categories = $this->categoryRepository->getAllByOrder('name')->load('posts');

        return view('admin.categories.index', compact('title', 'categories'));
    }
}
