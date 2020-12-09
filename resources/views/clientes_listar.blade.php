@extends('plantilla')


@section('contenido')


    <!-- nuevo cliente -->


    <!-- nuevo cliente -->
    <div class="w3-row">
        <div class="w3-col m4 l3">
            <div class="btn_nuevo">
                <a href="{{ url('/clientes/crear') }}" class="w3-button w3-blue">+ Nuevo Cliente</a>
            </div>
        </div>

        <!-- formulario buscar -->
        <form>
            <div class="w3-col m7 l8">
                <div>
                    <input class="w3-input w3-border" type="search" name="valor" value="{{ $valor }}" />
                </div>
            </div>
            <div class="w3-col m1 l1">
                <div>
                    <button type="submit" class="w3-button w3-border w3-blue"> Buscar </button>
                </div>
            </div>
        </form>
    </div>


    <hr>

    <!-- listado de clientes -->

    <h2>Clientes Registrados</h2>
    <div class="w3-responsive w3-margin-bottom">
        <table class="w3-table-all">
            <tr class="w3-dark-grey">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Direccion</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            @foreach ($clientes as $cliente)

                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>
                        <a href="{{ url('/clientes/' . $cliente->id . '/edit/') }}"
                            class="w3-button w3-highway-blue">Editar</a>
                    </td>

                    <td>
                        <form action="{{ url('/clientes/' . $cliente->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w3-button w3-highway-red">Eliminar</button>
                        </form>
                    </td>
                </tr>

            @endforeach

        </table>
    </div>

@endsection
