@extends('layouts.app')

@section('nav-links')
<a href="/login">
    logout
</a>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin">
    <header class="admin__header">
        <h2 class="admin__title">Admin</h2>
    </header>

    <div class="admin__filters">
        <form method="GET" action="{{ route('admin.index') }}" class="admin__filter-form">
            <input class="filters__name" type="text" name="keyword" placeholder="名前やメールアドレスを検索" value="{{ request('keyword') }}">

            <select name="gender">
                <option value="">性別</option>
                <option value="1" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == 'その他' ? 'selected' : '' }}>その他</option>
            </select>

            <select name="inquiry_type">
                <option value="">お問い合わせの種類</option>
                <option value="商品の交換について" {{ request('inquiry_type') == '商品の交換について' ? 'selected' : '' }}>商品の交換について</option>
                <!-- 他の種別もここに追加 -->
            </select>

            <input type="date" name="date" value="{{ request('date') }}">

            <button type="submit" class="admin__search">検索</button>
            <a href="{{ route('admin.index') }}" class="admin__reset">リセット</a>
        </form>
    </div>

    <div class="admin__other">
        <div class="admin__export">
            <form action="{{ route('admin.export') }}" method="POST">
                @csrf
                <button class="admin__export-button">エクスポート</button>
            </form>
        </div>

        <div class="admin__pagination">
            {{ $contacts->links() }}
        </div>
    </div>
    <table class="admin__table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->gender }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->inquiry_type }}</td>
                <td><a href="{{ route('admin.show', $contact->id) }}" class="admin__details">詳細</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection