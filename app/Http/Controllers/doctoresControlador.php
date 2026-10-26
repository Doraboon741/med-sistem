<?php

namespace App\Http\Controllers;

use App\Models\Doctorson;
use Illuminate\Http\Request;

class doctoresControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getDoctores()
    {
        $mediquillo = Doctorson::select(
            "doctores.id",
            "doctores.medico",
            "doctores.especialidad",
            "doctores.activo"
        )->get();
        return view('medicos-pantalla',compact('mediquillo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createDoctores(Request $request)
    {
        $request->validate([
            'inputMedico' => 'required',
            'inputEspecialidad' => 'required',
            'inputActivo' => 'required'
        ]);

        Doctorson::create([
            'medico' =>$request->inputMedico,
            'especialidad' =>$request->inputEspecialidad,
            'activo' => $request->inputActivo
        ]);

        return redirect('/medicos-pantalla')->with([
            'mensaje' => 'Doctor registrado'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function updateDoctores(Request $request, int $id)
    {
        $doctor = Doctorson::find($id);

        $request->validate([
            'inputMedico' => 'required',
            'inputEspecialidad' => 'required',
            'inputActivo' => 'required'
        ]);

        $doctor->update([
            'medico' => $request->inputMedico,
            'especialidad' => $request->inputEspecialidad,
            'activo' => $request->inputActivo
        ]);

        return redirect("/medicos-pantalla")->with([
            "mensaje" => "Medico actualizado"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function eliminateDoctores(int $id)
    {
       $doctor = Doctorson::where("id", "=", $id)->first(); 
       $doctor->delete();
       return redirect("/medicos-pantalla")->with([
        "mensaje" => 'Doctor eliminado'
       ]);
    }
}
