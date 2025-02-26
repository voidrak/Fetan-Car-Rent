<?php
namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        try {
            $cars = Car::all();
            return response()->json($cars);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'brand' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'engine' => 'required|string|max:255',
                'price_per_day' => 'required|numeric',
                'image' => 'nullable|string|max:255',
                'quantity' => 'required|integer',
                'status' => 'required|string|max:255',
                'reduce' => 'required|integer',
                'stars' => 'required|integer'
            ]);

            $car = Car::create($fields);

            return response()->json($car, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    public function show(Car $car)
    {
        try {
            return response()->json($car);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, Car $car)
    {
        try {
            $fields = $request->validate([
                'brand' => 'sometimes|string|max:255',
                'model' => 'sometimes|string|max:255',
                'engine' => 'sometimes|string|max:255',
                'price_per_day' => 'sometimes|numeric',
                'image' => 'sometimes|string|max:255',
                'quantity' => 'sometimes|integer',
                'status' => 'sometimes|string|max:255',
                'reduce' => 'sometimes|integer',
                'stars' => 'sometimes|integer'
            ]);

            $car->update($fields);

            return response()->json($car);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Car $car)
    {
        try {
            $car->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }
}
