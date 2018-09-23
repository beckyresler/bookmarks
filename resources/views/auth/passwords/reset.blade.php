@extends('layouts.auth', ['bodyClass' => 'auth password reset'])

@section('title', 'Reset Your Password')

@section('content')

    <h1 class="text-center">{{ config('site.website_title') }}</h1>

    <div class="callout">
        <h2>Reset Your Password</h2>

        {{-- are there any session messages? --}}
        @if(Session::has('status'))
            <div class="callout small success"><span class="fas fa-check-circle"></span> {!! Session::get('status') !!}</div>
        @endif
        @if(Session::has('success'))
            <div class="callout small success"><span class="fas fa-check-circle"></span> {!! Session::get('success') !!}</div>
        @endif
        @if(Session::has('error'))
            <div class="callout small alert"><span class="fas fa-exclamation-circle"></span> {!! Session::get('error') !!}</div>
        @endif

        {{-- are there any validation errors? --}}
        @if($errors->any())
            <div class="callout small alert">
                <span class="fas fa-exclamation-circle"></span> Please address the following errors and try again.
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form name="reset-password" method="post" action="{{ route('password.reset.process') }}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="field-group">
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email" value="" required autofocus>
        </div>
        <div class="field-group">
            <label for="password">New Password</label>
            <input type="password" name="password" id="password" value="" required>
        </div>
        <div class="field-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" value="" required>
        </div>
        <div class="field-group">
            <button class="button"><span class="fas fa-sync"></span> Reset Password</button>
        </div>
        </form>
        <p><a href="{{ route('login') }}"><span class="fas fa-chevron-circle-left"></span> Back to Log In</a></p>
    </div>

@endsection