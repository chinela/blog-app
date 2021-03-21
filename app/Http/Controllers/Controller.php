<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImage($image, $path = 'posts')
    {
        $path = "public/$path/";
        $fileName = sha1(microtime() . microtime()) . '.' . $image->getClientOriginalExtension();

        $image->storeAs($path, $fileName);

        return asset(Storage::url($path . $fileName));
    }

    public function deleteImage($path)
    {
        Storage::deleteDirectory($path);
    }

    public function validatePostRequest($request, $extra = [])
    {
        $rules = [
            'title' => 'required|max:100',
            'category_id' => 'required',
            'description' => 'required',
        ];
        $request->validate(array_merge($rules, $extra));
    }
}
