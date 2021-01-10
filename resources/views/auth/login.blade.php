@extends('layout')

@section('content')
<div class="mx-auto w-5/6 md:w-3/5 xl:w-1/2 border-2">
    <div class="bg-gray-200 pl-4 py-4">Login</div>

    <div class="px-6 py-4">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="w-3/4 mx-auto">
                <label
                    for="email"
                    class="text-grey-darker text-sm font-bold"
                >E-Mail Address</label>

                <div class="">
                    <input id="email"
                        type="email"
                        class="w-full border border-blue-600 @error('email') color-red-300 @enderror" name="email" value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                    >

                    @error('email')
                        <span class="text-red-600">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="w-3/4 mx-auto">
                <label
                    for="password"
                    class="text-grey-darker text-sm font-bold mb-2"
                >
                    Password
                </label>

                <div class="">
                    <input
                        id="password"
                        type="password"
                        class="w-full border border-blue-600 @error('password') border-red-300 @enderror"
                        name="password"
                        required
                        autocomplete="current-password"
                    >

                    @error('password')
                        <span class="">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="w-3/4 mx-auto pt-2">
                <div class="">
                    <div class="">
                        <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="" for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="pt-2">
                <div class="flex items-center justify-evenly px-4">
                    <button type="submit" class="px-6 py-2 bg-blue-300">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="text-blue-600" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
