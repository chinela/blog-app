@extends('layouts.admin')


@section('content')
@include('partials.messages')
<h1 class="text-xl">{{ $title }}</h1>

<div class="grid mt-6 grid-cols-1">
    <div class="card overflow-x-auto w-full">
        {{-- <div class="card-header bg-blue-200 font-bold">All Active Students</div> --}}

        <table class="table-auto bg-white w-full text-left">
            <thead>
                <tr>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs">Id</th>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs">Category</th>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs">Contributor</th>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs">Title</th>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs"></th>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs"></th>
                </tr>
            </thead>
            @foreach ($posts as $index => $post)
                <tbody class="text-gray-600">
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">{{ $post->category->name }}</td>
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">{{ $post->user->fullName }}</td>
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">{{ $post->title }}</td>
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">
                        <form action="{{ route('admin.post.delete') }}" method="POST" class="deletePost">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <input name="slug" type="hidden" value="{{ $post->slug }}">
                            <button id="deleteButton" class="py-1 rounded-md px-3 text-xs bg-red-500 text-white">Delete</button>
                        </form>
                    </td>
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">
                        <a href="{{ route('admin.post.edit', $post->slug) }}" class="py-1 rounded-md px-3 text-xs bg-blue-500 text-white">Edit Post</a>
                    </td>
                </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

    let deleteForms = document.getElementsByClassName('deletePost')
   
    for (const form of deleteForms) {
        $(form).on('submit', e=> {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                form.submit()
            })
        })
    }
</script>
@endsection