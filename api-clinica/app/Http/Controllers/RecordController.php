<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Record;


class RecordController extends Controller //CRUD
{
    public function index($patientId)
{
    $patient = Patient::findOrFail($patientId);

    return response()->json($patient->records);
}

public function store(Request $request, $patientId)
{
    $patient = Patient::findOrFail($patientId);

    $data = $request->validate([
        'diagnostico' => 'required|string|max:255',
        'data_atendimento' => 'required|date',
        'tratamento' => 'required|string',
        'observacoes' => 'nullable|string'
    ]);

    $record = $patient->records()->create($data);

    return response()->json($record, 201);
}

public function show($patientId, $recordId)
{
    $record = Record::where('patient_id', $patientId)
                    ->where('id', $recordId)
                    ->firstOrFail();

    return response()->json($record);
}

public function update(Request $request, $patientId, $recordId)
{
    $record = Record::where('patient_id', $patientId)
                    ->where('id', $recordId)
                    ->firstOrFail();

    $data = $request->validate([
        'diagnostico' => 'required|string|max:255',
        'data_atendimento' => 'required|date',
        'tratamento' => 'required|string',
        'observacoes' => 'nullable|string'
    ]);

    $record->update($data);

    return response()->json($record);
}

public function destroy($patientId, $recordId)
{
    $record = Record::where('patient_id', $patientId)
                    ->where('id', $recordId)
                    ->firstOrFail();

    $record->delete();

    return response()->json(null, 204);
}
}