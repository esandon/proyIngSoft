<?php

namespace App\Http\Controllers;
use App\Http\Requests\UsuarioStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User = User::all();
        return view('usuario.index',compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     * Muestra formulario para crear registro
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.index');
    }

    /**
     * Store a newly created resource in storage.
     * Almacena los registros recien creados
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioStoreRequest $request)
    {
        if($request->name == null or $request->email == null or $request->rut == null){
            return redirect()->route('usuario.create')->with('info','¡ No deje datos en blanco  !');
        }
        $usuario = User::create( $request->all() );
        $usuario->save();
        $userName=$request->name;
        $userEmail = $academic->email;
        $userRol = $usuario->rol;
        $pw = bcrypt($usuario->password);
        DB::table('users')->insert(
            ['name'=>$userName, 'email' => $userEmail, 'password'=>$pw, 'rol' =>$userRol] //el rol es academico por default
          );
          $usuario->save();

        return redirect()->route('usuario.index')->with('info','¡ Usuario Creado con exito -- Usuario : email ingresado');
    }

    /**
     * Display the specified resource.
     * Mostrar un registro en especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * Muestra formulario con los datos a editar 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $User = User::findOrFail($id);
        /*
        $rutconGuion = $Estudiante->rut;
        $rutSinGuon=
        $number = strVal(Rut::parse($rutconGuion)->number());
        $vn = strVal(Rut::parse($rutconGuion)->vn());
        $rutSinGuion=$number.$vn;

        $rutFormateado = Rut::set()->number($number)->vn($vn)->format();
        */
        return view('usuario.edit',compact('User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $User = User:: findOrFail($id);
        /*
        $request->rules([

            'email' => 'unique:users,correo_electronico,'.$User->id,
            'name' => 'unique:users,correo_electronico,'.$User->id,
            'rol' => 'unique:users,correo_electronico,'.$User->id,            
          ]);*/
        $User->name = $request->name;
        $User->email = $request->email;
        $User->rol = $request->rol;


        $rol2 = $request->rol2;
        $rol3 = $request->rol3;
        $rol4 = $request->rol4;

        if($rol2 =="" and $rol3 =="" and $rol4 =="" ){
            return redirect()->route('usuario.edit',$id)->with('info'.'¡Debe seleccionar al menos 1 carrera!');
        }
        if($rol2 == "SECRETARIA"){
            $User->rol = $rol2;
            $User->save();
        }
        if($rol2 == "JEFE DE CARRERA"){
            $User->rol = $rol3;
            $User->save();
        }
        if($rol2 == "PROFESOR"){
            $User->rol = $rol4;
            $User->save();
        }
        return redirect()->route('usuario.index',)->with('Datos','Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
