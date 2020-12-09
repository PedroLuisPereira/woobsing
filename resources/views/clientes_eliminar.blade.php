@extends('plantilla')


@section('contenido')

    <!-- nuevo cliente -->
    <div class="btn_nuevo">
        <a href="{{ route('cliente.index') }}" class="w3-button w3-blue"> Atras</a>
    </div>

    <hr>

    <div class="w3-modal-content">
        <div class="w3-panel w3-pale-red w3-border">
            <p>Cliente eliminado</p>
        </div>
    </div>

@endsection
