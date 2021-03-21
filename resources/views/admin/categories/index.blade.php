@extends('layouts.admin')


@section('content')

<h1 class="text-xl">{{ $title }}</h1>

<div class="grid mt-6 grid-cols-1">
    <div class="card overflow-x-auto w-full">

        <table class="table-auto bg-white w-full text-left">
            <thead>
                <tr>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs">Id</th>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs">Category Name</th>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs">Total Posts</th>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs">Date Created</th>
                </tr>
            </thead>
            @foreach ($categories as $index => $category)
                <tbody class="text-gray-600">
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">{{ $category->name }}</td>
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">{{ $category->posts->count() }}</td>
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">{{ $category->created_at->toFormattedDateString() }}</td>
                </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection
