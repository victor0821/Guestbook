@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Mi Perfil</h4>
                </div>
                
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ $user->avatar }}" class="rounded-circle" width="120" height="120" alt="Avatar">
                        <h3 class="mt-3">{{ $user->name }}</h3>
                        <span class="badge bg-{{ $user->isAdmin() ? 'danger' : 'primary' }}">
                            {{ $user->isAdmin() ? 'Administrador' : 'Usuario' }}
                        </span>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Registrado:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Mensajes en Guestbook:</strong> {{ $user->entries()->count() }}</p>
                            <p><strong>Eventos creados:</strong> {{ $user->events()->count() }}</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i> Editar Perfil
                        </a>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mt-4">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Mis Últimos Mensajes</h5>
                </div>
                <div class="card-body">
                    @forelse($entries as $entry)
                        <div class="mb-3 pb-3 border-bottom">
                            <p class="mb-1">{{ $entry->message }}</p>
                            <small class="text-muted">Publicado el {{ $entry->created_at->format('d/m/Y H:i') }}</small>
                        </div>
                    @empty
                        <p class="text-muted">No has publicado mensajes aún.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection