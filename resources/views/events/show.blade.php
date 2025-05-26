@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm mb-4">
        @if($event->image)
        <img src="{{ asset('storage/'.$event->image) }}" class="card-img-top" alt="{{ $event->title }}" style="max-height: 400px; object-fit: cover;">
        @endif
        <div class="card-body">
            <h1 class="card-title display-6">{{ $event->title }}</h1>
            <div class="d-flex align-items-center mb-3">
                <img src="{{ $event->user->avatar }}" class="rounded-circle me-2" width="40" height="40" alt="Organizador">
                <span>Organizado por {{ $event->user->name }}</span>
            </div>
            
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><i class="bi bi-calendar-event"></i> <strong>Fecha:</strong> 
                        {{ $event->start_date->format('l, d F Y') }} - {{ $event->end_date->format('l, d F Y') }}</p>
                    <p><i class="bi bi-clock"></i> <strong>Hora:</strong> 
                        {{ $event->start_date->format('h:i A') }} - {{ $event->end_date->format('h:i A') }}</p>
                </div>
                <div class="col-md-6">
                    <p><i class="bi bi-geo-alt"></i> <strong>Ubicación:</strong> {{ $event->location }}</p>
                </div>
            </div>

            <h5 class="mb-3">Descripción del Evento</h5>
            <p class="card-text">{{ $event->description }}</p>

            @auth
            @if(auth()->user()->id === $event->user_id || auth()->user()->isAdmin())
            <div class="mt-4 d-flex gap-2">
                <a href="{{ route('events.edit', $event) }}" class="btn btn-outline-primary">
                    <i class="bi bi-pencil"></i> Editar
                </a>
                <form action="{{ route('events.destroy', $event) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar este evento?')">
                        <i class="bi bi-trash"></i> Eliminar
                    </button>
                </form>
            </div>
            @endif
            @endauth
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Mensajes del Evento</h5>
        </div>
        
        <div class="card-body">
            @auth
            <form method="POST" action="{{ route('events.messages.store', $event) }}" class="mb-4">
                @csrf
                <div class="input-group">
                    <textarea class="form-control" name="content" placeholder="Escribe tu mensaje..." rows="2" required></textarea>
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-send"></i> Enviar
                    </button>
                </div>
            </form>
            @else
            <div class="alert alert-info">
                <a href="{{ route('login') }}">Inicia sesión</a> para publicar un mensaje.
            </div>
            @endauth

            <div class="mt-3">
                @forelse($event->messages as $message)
                <div class="mb-3 pb-3 border-bottom">
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ $message->user->avatar }}" class="rounded-circle me-2" width="32" height="32" alt="{{ $message->user->name }}">
                        <strong>{{ $message->user->name }}</strong>
                        <small class="text-muted ms-2">{{ $message->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-0">{{ $message->content }}</p>
                </div>
                @empty
                <p class="text-muted">No hay mensajes aún. Sé el primero en comentar.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection