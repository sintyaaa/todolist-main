@extends('layouts.app')
@section('content')

<style>
    .display-none {
        @apply hidden;
    }

    /* scrollbar */
    ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
    }

    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.3);
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }

    ::-webkit-scrollbar-thumb:window-inactive {
        background: rgba(255, 255, 255, 0.3);
    }
</style>
    <div class=" min-h-screen grid grid-cols-1 md:grid-cols-2">
        <div class="bg-indigo-200 flex justify-center items-center">
            <div class="">
                <img class="rounded-md" src="{{asset('assets/images/6206973.jpg')}}" alt="">
            </div>
        </div>
        <div class="flex justify-center items-center">
            <div class="rounded-sm p-6 mx-16 w-full">
                <h1 class="text-5xl font-bold text-center mb-3">Go-ToDo</h1>
                <h1 class="font-bold mb-2 text-center">Create New Account</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="w-full gap-4 sm:flex">
                        <div class="row mb-3 w-full">
                            <label for="name" class="col-md-4 col-form-label font-semibold text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="input input-bordered rounded-sm w-full  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2 w-full">
                            <label for="role" class="col-md-4 col-form-label font-semibold text-md-end">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select class="select select-bordered rounded-sm w-full" name="role" id="role">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-2">
                        <label for="email" class="col-md-4 col-form-label font-semibold text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="input input-bordered rounded-sm w-full  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="password" class="col-md-4 col-form-label font-semibold text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="input input-bordered rounded-sm w-full  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <label for="password-confirm" class="col-md-4 col-form-label font-semibold text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="input input-bordered rounded-sm w-full " name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                        <div class="flex justify-center mt-4">
                            <button type="submit" class="btn btn-outline w-full rounded-sm">
                                {{ __('Create Account') }}
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>

@endsection