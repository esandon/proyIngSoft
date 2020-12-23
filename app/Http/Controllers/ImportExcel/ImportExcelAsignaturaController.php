<?php

namespace App\Http\Controllers\ImportExcel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Validators\Failure;
use App\Imports\ImportarAsignaturas;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Asignatura;

class ImportExcelAsignaturaController extends Controller
{
    public function index()
    {
        $asignaturas = Asignatura::orderBy('created_at','DESC')->get();
        return view('importA.index',compact('asignaturas'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xls,xlsx',
            'codigo'        =>'required|string|min:8|max:10',
            'NRC'           =>'required|numeric|min:4|max:15',
            'asignatura'    =>'required|string|min:5|max:50',
        ],
        [
            'import_file.requerided' => _('.'),
            'codigo.required'       =>'El codigo es obligatorio. Debe ser alfanumérico DAIS-00404',
            'NRC.required'          =>'El NRC es obligatorio. Debe ser un valor númerico.',
            'asignatura.required'   =>'La asignatura es obligatoria',

        ]);
        
        try {
           if(!$request->file('import_file')){
               throw new \Exception('Archivo no existe');
           } 
           
           $file = $request->import_file;
           Excel::import(new ImportarAsignaturas,$file);
           return back()->with('success', 'Asignaturas cargadas exitosamente.');
            /*$import->import('import_file');*/
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();
             foreach ($failures as $failure) {
                 $failure->row(); // row that went wrong
                 $failure->attribute(); // either heading key (if using heading row concern) or column index
                
             }
        }
    }

}
