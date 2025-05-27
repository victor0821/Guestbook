@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-5 fw-bold">Eventos</h1>
        @auth
        <a href="{{ route('events.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Crear Evento
        </a>
        @endauth
    </div>

    @if($events->isEmpty())
    <div class="alert alert-info">
        No hay eventos disponibles actualmente.
    </div>
    @else
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($events as $event)
        <div class="col">
            <div class="card h-100 event-card">
                @if($event->image)
                <img src="{{ asset('storage/'.$event->image) }}" class="card-img-top" alt="{{ $event->title }}">
                @else
                <div class="card-img-top bg-secondary" style="height: 200px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-calendar-event text-white" style="font-size: 3rem;"></i>
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                    <p class="card-text">
                        <small class="text-muted">
                            <i class="bi bi-geo-alt"></i> {{ $event->location }}
                        </small>
                    </p>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('events.show', $event) }}" class="btn btn-sm btn-outline-primary">
                            Ver Detalles
                        </a>
                        <small class="text-muted">
                            {{ $event->messages->count() }} <i class="bi bi-chat-text"></i>
                        </small>
                    </div>
                </div>
                <div class="event-date">
                    {{ $event->start_date ? $event->start_date->format('d M') : 'Fecha no definida' }}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $events->links() }}
    </div>
    @endif
</div>
@endsection