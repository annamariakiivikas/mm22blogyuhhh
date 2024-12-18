@extends('partials.layout')
@section('content')
<div class="card bg-base-200 w-2/5 shadow-xl mx-auto my-auto">
    <div class="card-body">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Email</span>
                </div>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="input input-bordered w-full @error('email') input-error @enderror" />
                <div class="label">
                    @error('email')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Password</span>
                </div>
                <input type="password" name="password" placeholder="Password" class="input input-bordered w-full @error('password')input-error @enderror" />
                <div class="label">
                    @error('password')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Password Confirmation</span>
                </div>
                <input type="password" name="password_confirmation" placeholder="Password"
                    class="input input-bordered w-full @error('password_confirmation') input-error @enderror" />
                <div class="label">
                    @error('password_confirmation')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
            </label>

            <div class="flex items-center justify-end mt-4">
                <input type="submit" class="btn btn-primary" value="{{ __('Reset Password') }}">
            </div>
        </form>
    </div>
</div>

@endsection
