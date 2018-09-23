@extends('layouts.auth', ['bodyClass' => 'auth login'])

@section('title', 'Log In')

@section('content')

    <h1 class="text-center">{{ config('site.website_title') }}</h1>

    <div class="callout">
        <h2>Log In</h2>

        {{-- are there any session messages? --}}
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

        <form name="log-in" method="post" action="{{ route('login.process') }}">
        {{ csrf_field() }}
        <div class="field-group">
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email" value="" required autofocus>
        </div>
        <div class="field-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="" required>
        </div>
        <div class="field-group">
            <button class="button"><span class="fas fa-sign-in-alt"></span> Log In</button>
        </div>
        </form>
        <p><a href="{{ route('password.request') }}"><span class="fas fa-question-circle"></span> Forgot your password?</a></p>
    </div>

@endsection