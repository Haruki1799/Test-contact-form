@extends('layouts.app')

@section('nav-links')
<a href="/login" class="header-nav">login</a>
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
            <form method="POST" action="{{ route('register.store') }}" class="register-form">
                @csrf
                <label for="name" class="form-label">お名前</label>
                <input type="text" id="name" name="name" class="form-input" placeholder="例: 山田 太郎" value="{{ old('name') }}">
                @error('name')
                <div class="Registration__error">{{ $message }}</div>
                @enderror

                <label for="email" class="form-label">メールアドレス</label>
                <input type="text" id="email" name="email" class="form-input" placeholder="例: test@example.com" value="{{ old('email') }}">
                @error('email')
                <div class="Registration__error">{{ $message }}</div>
                @enderror

                <label for="password" class="form-label">パスワード</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="例: coachtech1106">
                @error('password')
                <div class="Registration__error">{{ $message }}</div>
                @enderror

                <button type="submit" class="register-button">登録</button>
            </form>
        </div>
    </div>
    @endsection