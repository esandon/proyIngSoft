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
           Excel::import(new ImportarAsignaturas,$file);
           return back()->with('success', 'Asignaturas cargadas exitosamente.');
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

}
