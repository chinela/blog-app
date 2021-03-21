@extends('layouts.blog')

@section('content')
<div class="lg:w-8/12 w-full mx-auto px-10">
    @include('partials.messages')

    <div class="mb-6 flex flex-col ">
        <div class="w-10 h-10 bg-{{ $post->user->color }}-500 text-white rounded-full shadow-lg leading-10 text-center mx-auto">
            {{ $post->user->initials }}
        </div>
        <div class="text-center mt-3">
            <h6 class="font-semibold text-gray-700 text-sm">{{ $post->user->fullName }}</h6>
            <span class="text-xs text-gray-500">{{ $post->user->role->name }}</span>
        </div>
        @if (auth()->user()->role->name == 'Administrator' || auth()->user()->id == $post->user_id)
        <div class="text-center mt-1">
            
            <button id="deleteButton" class="py-1 rounded-md px-3 text-xs bg-red-500 text-white">Delete Post</button>
            <form action="{{ route('post.delete', $post->slug) }}" method="POST" id="deletePost" style="display: none">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
            </form>
            <a href="{{ route('post.edit', $post->slug) }}" class="py-1 rounded-md px-3 text-xs bg-blue-500 text-white">Edit Post</a>
        </div>
        @endif
    </div>

    <h5 class="text-center text-xl font-semibold">{{ $post->title }}</h5>

    <div class="w-3/4 mx-auto mt-6">
        <img src="{{ $post->image }}" alt="image"> 

        <div class="mt-8">
            <p class="pre-line">
                {!! $post->description !!}
            </p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

    let deleteBtn = document.getElementById('deleteButton')
    let deleteForm = document.getElementById('deletePost')
    
    deleteBtn.addEventListener('click', function() {
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                deleteForm.submit()
            })
    })
</script>
@endsection