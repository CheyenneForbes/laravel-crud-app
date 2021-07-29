<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CarController extends Controller
{
    protected $dashboardController;

    public function __construct()
    {
        $this->dashboardController = new DashboardController();
    }

    public function create(Request $request) {
        $id = $request->id;
        $car = [];
        if ($id) {
            $car = Car::find($id);
        }
        return Inertia::render("Cars/CreateCar", [
            "car" => $car
        ]);
    }

    public function store(Request $request) {
        Car::updateOrCreate(
            ["id" => $request->id],
            [
                "brand" => $request->brand,
                "year" => $request->year,
                "license_plate" => $request->license_plate,
                "user_id" => $request->user()->id
            ]
        );
        return $this->dashboardController->index($request);
    }

    public function delete(Request $request) {
        Car::destroy($request->id);
        error_log($request->id);
        return $this->dashboardController->index($request);
    }
}
