<?php
namespace App\Http\Controllers;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller {
    public function index() { return response()->json(Vehiculo::all(), 200); }
    public function store(Request $request) {
        $data = $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'anio' => 'required|integer',
            'color' => 'required|string',
        ]);
        return response()->json(Vehiculo::create($data), 201);
    }
    public function show($id) { return response()->json(Vehiculo::findOrFail($id), 200); }
    public function update(Request $request, $id) {
        $v = Vehiculo::findOrFail($id);
        $data = $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'anio' => 'required|integer',
            'color' => 'required|string',
        ]);
        $v->update($data);
        return response()->json($v, 200);
    }
    public function destroy($id) {
        Vehiculo::destroy($id);
        return response()->json(['mensaje' => 'Eliminado'], 200);
    }
}
