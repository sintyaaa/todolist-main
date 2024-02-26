<!-- reset.blade.php -->

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
<body class="" style="">
    <div class=" min-h-screen grid grid-cols-1 md:grid-cols-2">

        <div class="flex justify-center items-center">
            <div class="rounded-sm p-6 mx-16 w-full">
                <h1 class="text-5xl font-bold text-center mb-6">Go-ToDo</h1>
                <h1 class="text-xl font-bold text-center">Reset Password</h1>
                <form class="" action="/reset/password/store" method="POST">
                    @csrf
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Email</span>
                        </div>
                        <input id="email" type="email" placeholder="someone@example.app" class="input input-bordered rounded-sm w-full  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">New password</span>
                        </div>
                        <input id="password" type="password" placeholder="Type your password here" class="input input-bordered rounded-sm w-full  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Confirm password</span>
                        </div>
                        <input id="password_confirmation" type="password" placeholder="Type your password here" class="input input-bordered rounded-sm w-full  @error('password') is-invalid @enderror"  name="password_confirmation" required autocomplete="current-password" />
                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </label>

                    <div class="flex justify-center py-6 sm:mt-4">
                        <button type="submit" class="btn btn-outline w-full rounded-sm">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
        <div class=" flex justify-center items-center">
            <div class="">
                <img class="rounded-md" src="{{asset('assets/images/6206973.jpg')}}" alt="">
            </div>
        </div>
    </div>
</body>
@endsection
