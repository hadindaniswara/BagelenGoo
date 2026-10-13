@extends('layouts.main')

@section('content')
    <h1>Our Team</h1>
    <p>Tim Pengembang BagelenGoo: Hadin Daniswara & Rekan Tim.</p>
    @if(isset($name))
        <div class="alert alert-success">
            <h4>Profil Tim: {{ ucfirst($name) }}</h4>
            <p>Anggota tim pengembang proyek BagelenGoo.</p>
        </div>
    @endif
@endsection