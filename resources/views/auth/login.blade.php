@extends('layout')

@section('content')
<div class="w-1/2 mx-auto border-2">
    <div class="bg-gray-100 pl-2 py-2">Login</div>

    <div class="p-2">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="pl-2">
                <label for="email" class="">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email"
                        type="email"
                        class="border border-blue-600 @error('email') color-red-300 @enderror" name="email" value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                    >

                    @error('email')
                        <span class="color-red-600">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="pl-2">
                <label for="password" class="">
                    Password
                </label>

                <div class="col-md-6">
                    <input
                        id="password"
                        type="password"
                        class="border border-blue-600 @error('password') color-red-300 @enderror"
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

            <div class="pl-2">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="pl-2">
                <div class="flex items-center justify-evenly ">
                    <button type="submit" class="mt-2 p-2 bg-blue-300">
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
