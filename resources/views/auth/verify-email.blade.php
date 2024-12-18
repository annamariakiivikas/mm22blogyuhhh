@extends('partials.layout')
@section('content')
<div class="card bg-base-200 w-2/5 shadow-xl mx-auto my-auto">
    <div class="card-body">
        <div class="mb-4 text-sm text-content">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-success">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <input type="submit" class="btn btn-primary" value="{{ __('Resend Verification Email') }}">


                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn btn-secondary">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
