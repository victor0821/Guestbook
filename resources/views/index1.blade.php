@extends('layouts.html')

@section('tittle')

@section('content')

<div class="container mt-5">
    <h1>Guestbook</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('guestbook.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Mensaje</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <hr>

    <h2>Mensajes anteriores</h2>
    @foreach($entries as $entry)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $entry->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $entry->email }}</h6>
                <p class="card-text">{{ $entry->message }}</p>
                <small class="text-muted">{{ $entry->created_at->diffForHumans() }}</small>
            </div>
        </div>
    @endforeach
</div>


@endsection