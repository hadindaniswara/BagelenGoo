@extends('layouts.main')

@section('content')
    <h1>Katalog Produk BagelenGoo</h1>
    <p>Pilih berbagai varian rasa kue bagelen favoritmu di bawah ini.</p>
    @if(isset($slug))
        <div class="alert alert-info">
            <h4>Detail Produk: {{ ucfirst(str_replace('-', ' ', $slug)) }}</h4>
            <p>Ini adalah halaman rincian untuk produk <strong>{{ $slug }}</strong>.</p>
        </div>
    @endif
@endsection