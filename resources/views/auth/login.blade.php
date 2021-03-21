@extends('layouts.auth')

@section('content')
<form class="w-full" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label for="email" class="block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2">
                Email Address
            </label>
            <input autofocus class=" form-control" name="email" id="email" type="email" value="{{ old('email') }}" id="email" required autocomplete="email">
            @error('email')
                <span class="text-xs text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label for="password" class="block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2">
                Password
            </label>
            <input class="form-control" name="password" type="password" autocomplete="new-password" id="password" required @error('password') autofocus @enderror >
        </div>
    </div>
    <button type="submit" class="bg-red-400 text-white w-full text-white py-4 px-4 rounded focus:outline-none focus:shadow-outline">
        Login
    </button>
</form>
<div class="mt-6 flex justify-center">
    <a class="text-gray-600 hover:text-red-500" href="{{ route('register') }}">
        {{ __('Don\'t have an account?') }}
    </a>
</div>
@endsection
