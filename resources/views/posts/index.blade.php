@extends('layouts.blog')

@section('content')
@if ($posts->count() > 0)
<div class="grid grid-cols-3 gap-16">
    @foreach ($posts as $post)
        <div>
            <a href="{{ route('post.show', $post->slug) }}" class="">
                <img src="{{ $post->image }}" alt="image" class="rounded-md h-auto max-w-full">
            </a>
            <div class="flex flex-row items-center mt-6">
                <h6 class="font-bold mb-0 text-sm">{{ $post->category->name }}</h6>
                <span class="ml-2 text-gray-500">  — {{ $post->created_at->toFormattedDateString() }}</span>
            </div>
            <a href="{{ route('post.show', $post->slug) }}" class="pt-3 font-bold text-gray-700 text-base">
                {{ $post->title }}
            </a>
            <div class="flex items-center mt-4">
                <div class="w-10 h-10 shadow-lg font-bold bg-{{ $post->user->color }}-500 text-white rounded-full text-center leading-10 text-sm">
                    {{ $post->user->initials }}
                </div>
                <div class="flex flex-col ml-2">
                    <h6 class="font-semibold text-gray-700 text-sm">{{ $post->user->fullName }}</h6>
                    <span class="text-xs text-gray-500">{{ $post->user->role->name }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
@else
    <h1 class="text-center text-3xl">No Post</h1>
@endif
@endsection