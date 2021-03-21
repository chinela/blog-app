@extends('layouts.blog')

@section('content')
@include('partials.messages')
@if ($posts->count() > 0)
<h1 class="my-4 font-bold text-center text-3xl">{{ ucwords($title) }}</h1>
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
        </div>
    @endforeach
</div>
@else
    <h1 class="text-center text-3xl">No Post</h1>
@endif
@endsection