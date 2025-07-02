<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $city = City::paginate(10);
        return $request->ajax() ? view('admin.city.city', compact('city'))->render() : view('admin.city.city', compact('city'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ])->validate();
        $city = $request->id ? City::find($request->id) : new City();
        $city->city_name = $request->name;
        $city->save();
        return redirect()->route('city.index');
    }
    public function delete(Request $request)
    {
        if (!$request->id) return response()->json(['error' => 'ID is required.'], 400);
        $city = City::find($request->id);
        if (!$city) return response()->json(['error' => 'City not found.'], 404);
        $city->delete();
        return response()->json(['success' => true]);
    }
}
