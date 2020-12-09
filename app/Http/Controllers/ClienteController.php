<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $valor = "";
        if (isset($_GET['valor'])) {
            $valor = $_GET['valor'];
            $clientes = DB::table('clientes')
                ->where('nombre', 'like', "%$valor%")
                ->orWhere('apellido', 'like', "%$valor%")
                ->orWhere('telefono', 'like', "%$valor%")
                ->orWhere('email', 'like', "%$valor%")
                ->orWhere('direccion', 'like', "%$valor%")
                ->get();
        } else {
            $clientes = Cliente::all();
        }

        $data = array(
            'clientes' => $clientes,
            'valor' => $valor
        );

        return view('clientes_listar', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes_crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validaciones
        $validacion = $request->validate([
            'nombre' => 'required|max:200',
            'apellido' => 'required|max:200',
            'telefono' => 'required|max:200',
            'email' => 'required|email|max:200',
            'direccion' => 'required|max:200',
            
        ]);

        //capturar datos 
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $telefono = $request->input('telefono');
        $email = $request->input('email');
        $direccion = $request->input('direccion');
        

        //crear cliente 
        $cliente = new Cliente;
        $cliente->nombre = $nombre;
        $cliente->apellido = $apellido;
        $cliente->telefono = $telefono;
        $cliente->email = $email;
        $cliente->direccion = $direccion;
        $cliente->save();

        return back()->with('respuesta', 'Cliente creado'); //mensaje flask
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente) //route model binding
    {
        return $cliente;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // $cliente = Cliente::find($id);
        $cliente = Cliente::findOrFail($id);
        $data = array(
            'cliente' => $cliente
        );

        return view('clientes_editar', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validaciones
        $validacion = $request->validate([
            'nombre' => 'required|max:200',
            'apellido' => 'required|max:200',
            'telefono' => 'required|max:200',
            'email' => 'required|email|max:200',
            'direccion' => 'required|max:200',
        ]);

        //capturar datos 
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $telefono = $request->input('telefono');
        $email = $request->input('email');
        $direccion = $request->input('direccion');

        //guardar
        $cliente = Cliente::findOrFail($id);
        $cliente->nombre = $nombre;
        $cliente->apellido = $apellido;
        $cliente->telefono = $telefono;
        $cliente->email = $email;
        $cliente->direccion = $direccion;
        $cliente->save();


        return back()->with('respuesta', 'Cliente actualizado'); //mensaje flask
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

       return view('clientes_eliminar');
    }
}
