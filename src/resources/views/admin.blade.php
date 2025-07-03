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
            @csrf
            <form method="GET" action="{{ route('admin.search') }}" class="admin__search-form">
                @csrf
                <input class="filters__name" type="text" name="keyword" placeholder="名前やメールアドレスを検索" value="{{ request('keyword') }}">

                <select name="gender">
                    <option value="">性別</option>
                    <option value="1" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
                    <option value="2" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
                    <option value="3" {{ request('gender') == 'その他' ? 'selected' : '' }}>その他</option>
                </select>

                <select name="inquiry_type">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>

                <input type="date" name="date" value="{{ request('date') }}">

                <button type="submit" class="admin__search">検索</button>
                <a href="{{ route('admin.index') }}" class="admin__reset">リセット</a>
            </form>
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
                <td>{{ $contact->first_name . $contact->last_name }}</td>
                <td> {{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}
                </td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content }}</td>
                <td>
                    <a href="#" class="admin__details open-modal" data-target="modal-{{ $contact->id }}">詳細</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @foreach ($contacts as $contact)
    <div id="modal-{{ $contact->id }}" class="modal">
        <div class="modal__content">
            <form action="/admin" class="delete" method="POST">
                <span class="modal__close" data-target="modal-{{ $contact->id }}">×</span>
                <div class="modal-item">
                    <p class="modal-item-label">お名前</p>
                    <p class="modal-item-label--value">{{ $contact->first_name .' '. $contact->last_name }}</p>
                </div>
                <div class="modal-item">
                    <p class="modal-item-label">性別</p>
                    <p class="modal-item-label--value">{{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}</p>
                </div>
                <div class="modal-item">
                    <p class="modal-item-label">メールアドレス</p>
                    <p class="modal-item-label--value">{{ $contact->email }}</p>
                </div>
                <div class="modal-item">
                    <p class="modal-item-label">電話番号</p>
                    <p class="modal-item-label--value">{{ $contact->tel }}</p>
                </div>
                <div class="modal-item">
                    <p class="modal-item-label">住所</p>
                    <p class="modal-item-label--value">{{ $contact->address }}</p>
                </div>
                <div class="modal-item">
                    <p class="modal-item-label">建物名</p>
                    <p class="modal-item-label--value">{{ $contact->building }}</p>
                </div>
                <div class="modal-item">
                    <p class="modal-item-label">お問い合わせの種類</p>
                    <p class="modal-item-label--value">{{ $contact->category->content }}</p>
                </div>
                <div class="modal-item">
                    <p class="modal-item-label">お問い合わせ内容</p>
                    <p class="modal-item-label--value">{{ $contact->detail }}</p>
                </div>
                <input type="submit" class="modal-btn" value="削除" />
            </form>
        </div>
    </div>
    @endforeach
</div>

@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.open-modal').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const modal = document.getElementById(this.dataset.target);
                if (modal) modal.style.display = 'block';
            });
        });

        document.querySelectorAll('.modal__close').forEach(btn => {
            btn.addEventListener('click', function() {
                const modal = document.getElementById(this.dataset.target);
                if (modal) modal.style.display = 'none';
            });
        });

        window.addEventListener('click', function(e) {
            if (e.target.classList.contains('modal')) {
                e.target.style.display = 'none';
            }
        });
    });
</script>
@endsection