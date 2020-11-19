<?php

namespace App\Http\Controllers\ImportExcel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Imports\ImportarAsignaturas;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Asignatura;


class ImportExcelControllerA extends Controller
{
    public function index()
    {
        $asignaturas = Asignatura::orderBy('created_at','DESC')->get();
        return view('import_excel.indexA',compact('asignaturas'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportarAsignaturas, request()->file('import_file'));
        return back()->with('Hecho', 'Asignaturas importadas con exito.');
    }

}

