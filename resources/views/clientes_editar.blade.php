@extends('plantilla')


@section('contenido')

    <!-- nuevo cliente -->
    <div class="btn_nuevo">
        <a href="{{ route('cliente.index') }}" class="w3-button w3-blue"> Atras</a>
    </div>

    <hr>

    <div class="w3-modal-content">
        @if (session('respuesta'))
            <div class="w3-panel w3-pale-green w3-border">
                <p>{{ session('respuesta') }}</p>
            </div>

        @else
            <header class="w3-container w3-light-grey">
                <h2>Editar Cliente</h2>
            </header>
            <div class="w3-container">
                <form action="{{ url('/clientes/' . $cliente->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p>
                        <input name="nombre" class="w3-input w3-border" type="text"
                            value="{{ old('nombre', $cliente->nombre) }}" maxlength="200" placeholder="Nombre">
                    </p>
                    {!! $errors->first('nombre', '<small class="w3-text-red">:message</small>') !!}
                    <p>
                        <input name="apellido" class="w3-input w3-border" type="text"
                            value="{{ old('apellido', $cliente->apellido) }}" maxlength="200" placeholder="Apellidos">
                    </p>
                    {!! $errors->first('apellido', '<small class="w3-text-red">:message</small>') !!}
                    <p>
                        <input name="telefono" class="w3-input w3-border" type="text"
                            value="{{ old('telefono', $cliente->telefono) }}" maxlength="200" placeholder="Telefono">
                    </p>
                    {!! $errors->first('telefono', '<small class="w3-text-red">:message</small>') !!}
                    <p>
                        <input name="email" class="w3-input w3-border" type="text"
                            value="{{ old('email', $cliente->email) }}" maxlength="200" placeholder="email">
                    </p>
                    {!! $errors->first('email', '<small class="w3-text-red">:message</small>') !!}
                    <p>
                        <input name="direccion" class="w3-input w3-border" type="text"
                            value="{{ old('direccion', $cliente->direccion) }}" maxlength="200" placeholder="direccion">
                    </p>
                    {!! $errors->first('direccion', '<small class="w3-text-red">:message</small>') !!}

                    <p>
                        <button class="w3-button w3-blue w3-padding-large" type="submit">Guardar</button>
                    </p>
                </form>
            </div>
        @endif
    </div>

@endsection
