@extends('layouts.main')

@section('content')
<style>
    .auth-wrap  { max-width: 420px; margin: 0 auto; padding: 64px 24px; width: 100%; }
    .auth-card  { background: #fff; border-radius: 16px; padding: 32px; box-shadow: 0 10px 30px rgba(45, 27, 18, .15); }
    .auth-title { text-align: center; font-size: 30px; font-weight: 700; color: var(--color-maroon-700, #7a1f2b); margin: 0 0 4px; }
    .auth-sub   { text-align: center; font-size: 14px; opacity: .7; margin: 0 0 24px; }
    .auth-field { margin-bottom: 16px; }
    .auth-label { display: block; font-size: 14px; font-weight: 500; margin-bottom: 6px; }
    .auth-input { width: 100%; padding: 10px 12px; border: 1px solid rgba(45, 27, 18, .25); border-radius: 8px; outline: none; }
    .auth-input:focus { border-color: var(--color-spice-500, #f28c28); }
    .auth-btn   { width: 100%; padding: 12px; border: 0; border-radius: 8px; cursor: pointer; font-weight: 600; color: #fff; background: var(--color-spice-500, #f28c28); }
    .auth-btn:hover { opacity: .9; }
    .auth-error { background: #fef2f2; border: 1px solid #fca5a5; color: #991b1b; border-radius: 8px; padding: 10px 14px; font-size: 14px; margin-bottom: 16px; }
</style>

<section class="auth-wrap">
    <div class="auth-card">
        <h1 class="auth-title font-display">Login Admin</h1>
        <p class="auth-sub">Khusus pengelola BagelenGoo</p>

        @if ($errors->any())
            <div class="auth-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="auth-field">
                <label class="auth-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="auth-input">
            </div>
            <div class="auth-field">
                <label class="auth-label">Password</label>
                <input type="password" name="password" class="auth-input">
            </div>
            <button type="submit" class="auth-btn">Masuk</button>
        </form>
    </div>
</section>
@endsection