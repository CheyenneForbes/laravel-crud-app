<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::where('user_id', $request->user()->id)->get();
        return Inertia::render('Dashboard', [
            'cars' => $cars
        ]);
    }
}
