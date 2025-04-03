@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Orden</h1>
    
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select class="form-control" name="status">
                <option value="pendiente">Pendiente</option>
                <option value="pagada">Pagada</option>
                <option value="cancelada">Cancelada</option>
                <option value="entregada">Entregada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
