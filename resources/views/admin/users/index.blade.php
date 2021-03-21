@extends('layouts.admin')


@section('content')
@include('partials.messages')
<h1 class="text-xl">{{ $title }}</h1>

<div class="grid mt-6 grid-cols-1">
    <div class="card overflow-x-auto w-full">

        <table class="table-auto bg-white w-full text-left">
            <thead>
                <tr>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs">Id</th>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs">First Name</th>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs">Last Name</th>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs">Email</th>
                    <th class="px-4 md:px-3 py-2 borde text-sm md:text-xs">Role</th>
                </tr>
            </thead>
            @foreach ($users as $index => $user)
                <tbody class="text-gray-600">
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">{{ $user->first_name }}</td>
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">{{ $user->last_name }}</td>
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">{{ $user->email }}</td>
                    <td class="border border-l-0 text-sm md:px-3 md:py-3 px-4 py-2">{{ $user->role->name }}</td>
                </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection