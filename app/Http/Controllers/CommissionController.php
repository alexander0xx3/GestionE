<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'aula' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'professor_id' => 'nullable|exists:professors,id', // Profesor principal opcional
            'professors_id' => 'nullable|array', // Lista de profesores opcional
            'professors_id.*' => 'exists:professors,id',
        ]);

        // Crear la comisión con el profesor principal si se envió
        $commission = Commission::create([
            'aula' => 'Aula ' . $request->aula,
            'horario' => $request->horario1 . ' - ' . $request->horario2,
            'course_id' => $request->course_id,
            'professor_id' => $request->professor_id ?? null, // Asignar si se envió
        ]);

        // Asignar profesores en la tabla pivote
        if ($request->has('professors_id')) {
            $commission->professors()->syncWithoutDetaching($request->professors_id);
        }

        return redirect()->route('panel.index', 'Comisiones')->with('success', 'Comisión creada correctamente.');
    }

    public function update(Request $request, $id)
    {
        $commission = Commission::findOrFail($id);

        // Validación corregida
        $validated = $request->validate([
            'aula' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'professor_id' => 'nullable|exists:professors,id',
            'professors_id' => 'nullable|array',
            'professors_id.*' => 'exists:professors,id',
        ]);

        $commission->update([
            'aula' => $validated['aula'],
            'horario' => $validated['horario'],
            'course_id' => $validated['course_id'],
            
        ]);

        // Actualizar profesores en la tabla pivote
        $commission->professors()->sync($request->input('professors_id', []));

        return redirect()->route('panel.show', ['tipo' => 'Comisiones', 'id' => $commission->id])
            ->with('success', 'Comisión actualizada correctamente.');
    }

    public function destroy(Commission $commission)
    {
        $commission->delete();
        return redirect()->route('panel.index', 'Comisiones')
            ->with('success', 'Comisión <' . $commission->aula . ' (' . $commission->horario . ')> eliminada.');
    }
}
