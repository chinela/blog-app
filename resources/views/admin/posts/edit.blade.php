@extends('layouts.admin')

@section('content')
<div class="w-6/12 mx-auto border bg-white py-4 px-10">
    @include('partials.messages')
    <h5 class="text-center font-semibold">Update Post</h5>

    <form action="{{ route('admin.post.update', $post->slug) }}" method="POST" class="mt-6" enctype="multipart/form-data">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label for="title" class="block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Blog Title
                </label>
                <input autofocus class=" form-control" name="title" id="title" type="title" value="{{ old('title') ?? $post->title }}" required>
                @error('title')
                    <span class="text-xs text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label for="category" class="block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Blog Category
                </label>
                <select class=" form-control" name="category_id" id="category" required>
                    <option value="">Choose Category</option>
                    @foreach ($categories as $category)
                        <option {{ (old('category_id') == $category->id) || ( $post->category_id == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-xs text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label for="image" class="block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Feature Image
                </label>
                <input class=" form-control" name="image" id="image" type="file">
                @error('image')
                    <span class="text-xs text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <img src="{{ $post->image }}" class="w-20 h-12" alt="image">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label for="description" class="block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Blog Description
                </label>
                <textarea class=" form-control" name="description" id="description" type="description" required rows="5">{{ old('description') ?? $post->description }}</textarea>
                @error('description')
                    <span class="text-xs text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <button type="submit" class="bg-red-400 text-white w-full text-white py-4 px-4 rounded focus:outline-none focus:shadow-outline">
            Update Post
        </button>
    </form>
</div>
@endsection