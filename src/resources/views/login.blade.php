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
            <form method="POST" action="{{ route('login') }}" class="login__form">
                @csrf
                <label for="email" class="login__label">メールアドレス</label>
                <input type="email" id="email" name="email" class="login__input" placeholder="例: test@example.com" required>

                <label for="password" class="login__label">パスワード</label>
                <input type="password" id="password" name="password" class="login__input" placeholder="例: coachtechno6" required>

                <button type="submit" class="login__button">ログイン</button>
            </form>
        </div>
    </div>
@endsection