@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Editar Evento</h4>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('events.update', $event) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Título del Evento</label>
                            <input type="text" class="form-control" id="title" name="title" 
                                   value="{{ old('title', $event->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="description" name="description" 
                                      rows="3" required>{{ old('description', $event->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Ubicación</label>
                            <input type="text" class="form-control" id="location" name="location" 
                                   value="{{ old('location', $event->location) }}" required>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="start_date" class="form-label">Fecha de Inicio</label>
                                <input type="datetime-local" class="form-control" id="start_date" name="start_date" 
                                       value="{{ old('start_date', $event->start_date->format('Y-m-d\TH:i')) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="end_date" class="form-label">Fecha de Fin</label>
                                <input type="datetime-local" class="form-control" id="end_date" name="end_date" 
                                       value="{{ old('end_date', $event->end_date->format('Y-m-d\TH:i')) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen del Evento</label>
                            @if($event->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$event->image) }}" class="img-thumbnail" width="200" alt="Imagen actual">
                            </div>
                            @endif
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('events.show', $event) }}" class="btn btn-secondary me-md-2">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection