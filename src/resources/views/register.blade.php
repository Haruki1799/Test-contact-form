@extends('layouts.app')

@section('nav-links')
<a href="/login">
    login
</a>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register">
    <div class="register__header">
        <h1 class="register__logo">register</h1>
    </div>
    <div class="register">
        <div class="register__form-wrapper">
            <form class="register-form">
                <label for="name" class="form-label">お名前</label>
                <input type="text" id="name" class="form-input" placeholder="例: 山田 太郎" />

                <label for="email" class="form-label">メールアドレス</label>
                <input type="email" id="email" class="form-input" placeholder="例: test@example.com" />

                <label for="password" class="form-label">パスワード</label>
                <input type="password" id="password" class="form-input" placeholder="例: coachtech1106" />

                <button type="submit" class="register-button">登録</button>
            </form>
        </div>
    </div>
@endsection