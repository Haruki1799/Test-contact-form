@extends('layouts.app')

@section('nav-links')
<a href="/admin">
    admin
</a>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/contacts/confirm" method="POST">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <div class="form__input--name">
                        <input class="form__input--first_name" type="text" name="first_name" placeholder="例 山田" value="{{ old('first_name', session('draft_contact.first_name')) }}" />
                        <input class="form__input--last_name" type="text" name="last_name" placeholder="例 太郎" value="{{ old('last_name', session('draft_contact.last_name')) }}" />
                    </div>
                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <!-- <input type="radio" name="gender" value="1" checked />男性 -->
                    <!-- <input type="radio" name="gender" value="2" />女性 -->
                    <!-- <input type="radio" name="gender" value="3" />その他 -->
                    <label>
                        <input type="radio" name="gender" value="1"
                            {{ old('gender', session('draft_contact.gender') ?? $contact['gender'] ?? '') == 1 ? 'checked' : '' }}>
                        男性
                    </label>

                    <label>
                        <input type="radio" name="gender" value="2"
                            {{ old('gender', session('draft_contact.gender') ?? $contact['gender'] ?? '') == 2 ? 'checked' : '' }}>
                        女性
                    </label>

                    <label>
                        <input type="radio" name="gender" value="3"
                            {{ old('gender', session('draft_contact.gender') ?? $contact['gender'] ?? '') == 3 ? 'checked' : '' }}>
                        その他
                    </label>

                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="例 test@example.com" value="{{ old('email', session('draft_contact.email')) }}" />
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <div class="form__input--text--tel">
                        <input type="text" name="tel1" size="4" maxlength="4" placeholder="例: 090" value="{{ old('tel1', session('draft_contact.tel1')) }}"> -
                        <input type="text" name="tel2" size="4" maxlength="4" placeholder="例: 1234" value="{{ old('tel2', session('draft_contact.tel2')) }}"> -
                        <input type="text" name="tel3" size="4" maxlength="4" placeholder="例: 5678" value="{{ old('tel3', session('draft_contact.tel3')) }}">
                    </div>
                </div>
                <div class="form__error">
                    @error('tel')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" placeholder="例 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', session('draft_contact.address')) }}" />
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="例 千駄ヶ谷マンション101" value="{{ old('building', session('draft_contact.building')) }}" />
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <select class="form__input--text--category" name="category_id">
                        <option value="">選択してください</option>
                        @foreach ($categories as $category)
                        <!-- <option value="{{ $category->id }}">{{ $category->content }}</option> -->
                        <option value="{{ $category->id }}"
                            {{ old('category_id', session('draft_contact.category_id') ?? $contact['category_id'] ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>

                            @endforeach
                    </select>
                </div>
            <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記入下さい。">{{ old('detail', session('draft_contact.detail')) }}</textarea>
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection