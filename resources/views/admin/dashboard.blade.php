@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="display-5 fw-bold mb-4">Panel de Administración</h1>
    
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Usuarios Totales</h5>
                    <h2 class="card-text">{{ $stats['total_users'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Usuarios Activos</h5>
                    <h2 class="card-text">{{ $stats['active_users'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title">Administradores</h5>
                    <h2 class="card-text">{{ $stats['admins'] }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Acciones Rápidas</h5>
        </div>
        <div class="card-body">
            <div class="d-flex gap-3"><!--admin.dashboard admin.users.index-->
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                    <i class="bi bi-people"></i> Gestionar Usuarios
                </a>
            </div>
        </div>
    </div>
</div>
@endsection