@extends('layouts.auth', ['bodyClass' => 'auth password forgot'])

@section('title', 'Forgot Your Password?')

@section('content')

    <h1 class="text-center">{{ config('site.website_title') }}</h1>

    <div class="callout">
        <h2>Forgot Your Password?</h2>

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

        <p>Enter your email address below, and you will receive an email with a link to create a new password for your account.</p>
        <form name="forgot-password" method="post" action="{{ route('password.email') }}">
        {{ csrf_field() }}
        <div class="field-group">
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email" value="" required autofocus>
        </div>
        <div class="field-group">
            <button class="button"><span class="fas fa-paper-plane"></span> Send Password Reset Link</button>
        </div>
        </form>
        <p><a href="{{ route('login') }}"><span class="fas fa-chevron-circle-left"></span> Back to Log In</a></p>
    </div>

@endsection