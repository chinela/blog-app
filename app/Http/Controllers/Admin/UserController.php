<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(UserRepositoryInterface $user)
    {
        $this->userRepository = $user;
    }

    public function index()
    {
        $title = 'All Users';
        $users = $this->userRepository->getAllByOrder('created_at', 'DESC')->load('role');

        return view('admin.users.index', compact('title', 'users'));
    }
}
