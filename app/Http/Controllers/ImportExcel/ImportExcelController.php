<?php

namespace App\Http\Controllers\ImportExcel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ImportarEstudiantes;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Estudiante;


class ImportExcelController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::orderBy('created_at','DESC')->get();
        return view('import_excel.index',compact('estudiantes'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportarEstudiantes, request()->file('import_file'));
        return back()->with('Hecho', 'Estudiantes importados con exito.');
    }

}
