<?php

namespace App\Http\Controllers;

use App\Models\Delegacion;
use App\Models\Genero;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $delegaciones = Delegacion::get();
        $delegaciones = Delegacion::orderBy('delegacion')->get();
        $generos = Genero::pluck('genero','id');

        // dd($generos);
        // $user = User::with('delegacion')->get();
        // return view('admin.users.edit', compact('user','delegaciones'));

        $user = User::with('delegacion')->find($id);
        return view('admin.users.edit', compact('user','delegaciones','generos'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    /*public function update(Request $request, string $id)
    {
        return "Se actualizara la información";
    }
*/

    public function update(Request $request, User $user)
    {

        // dd($request);

        $validation = $request->validate([
            'delegacion' => 'required',
            'name' => 'required',
            'apaterno' => 'required',
            'genero' => 'required',
            'telefono' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->id_delegacion = $request->input('delegacion');
        $user->name = strtoupper($request->input('name'));
        $user->apaterno = strtoupper($request->input('apaterno'));
        $user->amaterno = strtoupper($request->input('amaterno'));
        $user->id_genero = $request->input('genero');
        $user->telefono = $request->input('telefono');
        $user->email = $request->input('email');
        $user->slug = Str::slug(
            $request->input('name').'-'.
            $request->input('apaterno').'-'.
            $request->input('amaterno')
        );

        $user->update();

        return redirect()->route('user.show',$user)->with('update','Actualización Exitosa');
        


/*
        'name' => ['required', 'string', 'max:255'],
        'apaterno' => ['required', 'string', 'max:255'],
        // 'amaterno' => ['required', 'string', 'max:255'],
        'genero' => ['required', 'int', 'max:255'],
        'delegacion' => ['required', 'int', 'max:255'],
        'telefono' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      
        
        
        
        $maestro->titulo = $request->input('titulo');
        $maestro->nombre = strtoupper($request->input('nombre'));
        $maestro->apaterno = strtoupper($request->input('apaterno'));
        $maestro->amaterno = strtoupper($request->input('amaterno'));
        $maestro->id_genero = $request->input('genero');
        $maestro->telefono = strtoupper($request->input('telefono'));
        $maestro->email = $request->input('email');
        $maestro->direccion = strtoupper($request->input('direccion'));
        $maestro->cp = $request->input('cp');
        $maestro->ciudad = strtoupper($request->input('ciudad'));
        $maestro->estado = strtoupper($request->input('estado'));
    
 
        $maestro->update();
        return redirect()->route('maestro.show',$maestro)->with('update', 'Registro actualizado con éxito.');
 */ 
    }

















    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
