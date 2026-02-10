<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Patient;

class PatientController extends Controller //CRUD
{
    /**
     * Display a listing of the resource.
     */
    public function index() // vai retornar todos os pacientes
    {
        return response()->json(patient::all(),200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //Vai te criar um novo paciente
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:patients,cpf',
            'data_nascimento' => 'required|date',
            'email' => 'required|email',
            'telefone' => 'required|string'
        ]);

        $patient = Patient::create($data);

        return response()->json($patient, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::findOrFail($id); //Mostra um paciente especifico
        return response()->json($patient);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) // Aqui voce faz update/atualização de um paciente
    {
        $patient = Patient::findOrFail($id);

        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:patients,cpf,' . $patient->id,
            'data_nascimento' => 'required|date',
            'email' => 'required|email',
            'telefone' => 'required|string'
        ]);

        $patient->update($data);

        return response()->json($patient);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return response()->json(null, 204);
    }
}
