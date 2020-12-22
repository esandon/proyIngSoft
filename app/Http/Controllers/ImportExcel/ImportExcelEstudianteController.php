<?php

namespace App\Http\Controllers\ImportExcel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ImportarEstudiantes;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\Failure;
use DB;
use App\Estudiante;

class ImportExcelEstudianteController extends Controller
{
    
    public function index()
    {
        $estudiantes = Estudiante::orderBy('created_at','DESC')->get();
        return view('importE.index',compact('estudiantes'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xls,xlsx'
        ],
        [
            'import_file.requerided' => _('.'),

        ]);
        
        try {
           if(!$request->file('import_file')){
               throw new \Exception('Archivo no existe');
           } 
           
           $file = $request->import_file;
           Excel::import(new ImportarEstudiantes,$file);
           return back()->with('success', 'Estudiantes cargados exitosamente.');
            /*$import->import('import_file');*/
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();
             foreach ($failures as $failure) {
                 $failure->row(); // row that went wrong
                 $failure->attribute(); // either heading key (if using heading row concern) or column index
                 $failure->errors(); // Actual error messages from Laravel validator
                 $failure->values(); // The values of the row that has failed.
             }
        }
    }

    public function importInsert(Request $request){
        $request->validate([
                            'rut'                   =>'required',
                            'apellido_paterno'      =>'required',
                            'apellido_materno'      =>'required',
                            'nombre'                =>'required',
                            'codigo_carrera'        =>'required',
                            'correo_electronico'    =>'required',


        ]);
        if($request->get("rut")){
            $rutExists = $request->get('rut');
            $data = DB::table("estudiantes")->where('rut', $codesExists)->count();
            if($data > 0)
            {
                return redirect()->back()->with('Rut ya existe',"Exit already.!");
            }
            else
            {
                $importInsert = [
                    'rut' 	=>	$request->Rut,
                    'apellido_paterno' 	=>	$request->apellido_paterno,
                    'apellido_paterno' 	=>	$request->apellido_materno,
                    'nombre'        	=>	$request->nombre,
                    'codigo_carrera'     => $request->codigo_carrera,
                    'correo_electronico' =>$request->correo_electronico,
                ];
                DB::table('estudiantes')->insert($importInsert);
                return redirect()->back()->with('importInsert','Insert Sucessful.!');
            }

        }
    }

    public function importUpdate(Request $request)
	{
		$importUpdate = [
            'rut' 	=>	$request->rut,
            'apellido_paterno' 	=>	$request->apellido_paterno,
            'apellido_paterno' 	=>	$request->apellido_materno,
            'nombre'           	=>	$request->nombre,
            'codigo_carrera'     => $request->codigo,
            'correo_electronico' =>$request->correo_electronico,
        ];
		DB::table('estudiantes')->where('rut',$request->rutUpdate)->update($importUpdate);
		return redirect()->back()->with('importUpdate' ,'Update Successfull.!');
    }

    // delete
    public function importDelete($importrut)
    {
		DB::table('estudiantes')->where('rut',$importrut)->delete();
		return redirect()->back()->with('importDelete','Delect Successfull.!');
    }
    
}
