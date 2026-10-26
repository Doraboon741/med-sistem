<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Doctorson;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with('medico')->get(); // Trae las citas con su médico
        $medicos = Doctorson::all(); // Para llenar el select del formulario
        return view('citas-pantalla', compact('citas', 'medicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente' => 'required',
            'medico_id' => 'required',
            'consultorio' => 'required',
            'fecha_hora' => 'required|date'
        ]);

        $medico = Doctorson::find($request->medico_id);

        if($medico && $medico->activo == 0){
            return back()->withErrors(['error' => 'El medico está inactivo'])->withInput();
        }

        $medicoOcupado = Cita::where('medico_id', $request->medico_id)
        ->where('fecha_hora', $request->fecha_hora)
        ->exists();

        if ($medicoOcupado) {
            return back()->withErrors(['error' => 'El médico seleccionado ya tiene una cita a esta misma hora.'])->withInput();
        }

        // es para crear la cita, el create
        Cita::create([
            'paciente' => $request->paciente,
            'medico_id' => $request->medico_id,
            'consultorio' => $request->consultorio,
            'fecha_hora' => $request->fecha_hora,
        ]);

        return redirect()->back()->with('success', '¡La cita se ha guardado!');
    }

    public function update(Request $request, int $id)
    {
    $request->validate([
        'paciente' => 'required',
        'medico_id' => 'required',
        'consultorio' => 'required',
        'fecha_hora' => 'required|date',
    ]);

    $medico = Doctorson::find($request->medico_id);
    if ($medico && $medico->activo == 0) {
        return back()->withErrors(['error' => 'No se puede modificar la cita con un médico inactivo.'])->withInput();
    }

    $medicoOcupado = Cita::where('medico_id', $request->medico_id)
        ->where('fecha_hora', $request->fecha_hora)
        ->exists();

    if ($medicoOcupado) {
        return back()->withErrors(['error' => 'El médico seleccionado ya tiene otra cita a esta misma hora.'])->withInput();
    }

    $cita = Cita::findOrFail($id);
    $cita->update([
        'paciente' => $request->paciente,
        'medico_id' => $request->medico_id,
        'consultorio' => $request->consultorio,
        'fecha_hora' => $request->fecha_hora,
    ]);

    return redirect()->back()->with('success', '¡Cita actualizada con éxito!');
    }

    public function destroy(int $id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();

        return redirect()->back()->with('success', 'Se cancelo la cita');
    }
}
