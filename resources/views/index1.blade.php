@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Guestbook</h4>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('guestbook.store') }}">
                        @csrf

                        @guest
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endguest

                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" 
                                      id="message" name="message" rows="3" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send"></i> Publicar Mensaje
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Mensajes Recientes</h5>
                </div>
                <div class="card-body">
                    @forelse($entries as $entry)
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="d-flex align-items-center mb-2">
                            @if($entry->user_id)
                            <img src="{{ $entry->user->avatar }}" class="rounded-circle me-2" width="40" height="40" alt="{{ $entry->user->name }}">
                            @else
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                <i class="bi bi-person"></i>
                            </div>
                            @endif
                            <div>
                                <strong>{{ $entry->name }}</strong>
                                <small class="text-muted ms-2">{{ $entry->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        <p class="mb-0">{{ $entry->message }}</p>
                    </div>
                    @empty
                    <p class="text-muted">No hay mensajes aún. Sé el primero en publicar.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection