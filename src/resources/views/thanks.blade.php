@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks">
    <div class="thanks__background-text">Thank you</div>
    <div class="thanks__content">
        <h2 class="thanks__heading">お問い合わせありがとうございました</h2>
        <a href="/" class="thanks__button">HOME</a>
    </div>
</div>
@endsection