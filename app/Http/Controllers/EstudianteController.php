<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EstudianteUpdateRequest;
use App\Estudiante;
use Freshwork\ChileanBundle\Rut;
use Illuminate\Validation\Rule;



class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $Estudiante = Estudiante::orderBy('apellido_paterno','DESC')->get();
       

        if ($request) {
            /*
            $query = trim($request->get( key: 'search'));
            */
            
            $nombre = $request->get('buscarpor');
            $rut = $request->get('buscarporRut');
            /*
             $Estudiante = Estudiante::where('rut','LIKE','%'. $request->rut. '%')
             */
            $Estudiante = Estudiante::nombre($nombre)->rut($rut)->paginate(5);
            /*
            return view('estudiante.search',['estudiantes' => $Estudiante,'search' => $query]);
            */
            return view('estudiante.index',compact('Estudiante'));
           
        }
        return view('estudiante.index',compact('Estudiante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $Estudiante = Estudiante::findOrFail($id);
        /*
        $rutconGuion = $Estudiante->rut;
        $rutSinGuon=
        $number = strVal(Rut::parse($rutconGuion)->number());
        $vn = strVal(Rut::parse($rutconGuion)->vn());
        $rutSinGuion=$number.$vn;

        $rutFormateado = Rut::set()->number($number)->vn($vn)->format();
        */
        return view('estudiante.edit',compact('Estudiante'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstudianteUpdateRequest $request, $id)
    {
        $Estudiante = Estudiante:: findOrFail($id);

        $request->rules([
            'correo_electronico' => 'unique:estudiantes,correo_electronico,'.$Estudiante->id,
        ]);


        $Estudiante->correo_electronico = $request->correo_electronico;
        $Estudiante->save();
        return redirect()->route('estudiante.index')->with('Datos','Registro actualizado');
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

    public function search(Request $request)
    {
        if ($request) {
            /*
            $query = trim($request->get( key: 'search'));
            */
            $nombre = $request->get('buscarpor');
            $rut = $request->get('buscarporRut');
            /*
             $Estudiante = Estudiante::where('rut','LIKE','%'. $request->rut. '%')
             */
            $Estudiante = Estudiante::nombre($nombre)->rut($rut)->paginate(5);
            /*
            return view('estudiante.search',['estudiantes' => $Estudiante,'search' => $query]);
            */
            return view('estudiante.index',compact('Estudiante'));
           
        }
    }  
    public function confirm($id)
    {
        $Estudiante = Estudiante::finOrFail($id);
        return view('estudiante.confirm',compact('Estudiante'));
    }
}
