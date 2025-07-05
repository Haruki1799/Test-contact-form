@extends('layouts.app')

@section('nav-links')
<a href="/register">
    register
</a>
@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login">
    <div class="login__header">
        <h1 class="login__logo">login</h1>
    </div>
    <div class="login">
        <div class="login__form-wrapper">
                <form method="POST" action="{{ route('login.attempt') }}" class="login__form" novalidate>
                    @csrf
                    <label for="email" class="login__label">メールアドレス</label>
                    <input type="text" name="email" class="login__input @error('email') is-invalid @enderror" placeholder="例: test@example.com">
                    @error('email')
                    <div class="login__error">{{ $message }}</div>
                    @enderror

                    <label for="password" class="login__label">パスワード</label>
                    <input type="password" id="password" name="password" class="login__input @error('password') is-invalid @enderror" placeholder="例: coachtechno6">
                    @error('password')
                    <div class="login__error">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="login__button">ログイン</button>
                </form>
        </div>
    </div>
    @endsection