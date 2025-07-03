<?php

namespace App\Http\Controllers\admin;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class AreaController extends Controller
{
    public function index(Request $request)
    {
        $city = DB::table('city')->get();

        $area = Area::leftJoin('city', 'area.city_id', '=', 'city.id')
                ->select('area.*', 'city.city_name as city_name', 'city.id as city_id')
                ->where('area', 'like', '%' . $request->search . '%')
                ->orWhere('pincode', 'like', '%' . $request->search . '%')->paginate(10);

        return $request->ajax() ? view('admin.area.area', compact('area', 'city'))->render() : view('admin.area.area', compact('area', 'city'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'pincode' => 'required',
            'city' => 'required',
        ])->validate();
        $area = $request->id ? area::find($request->id) : new area();
        $area->area = $request->name;
        $area->pincode = $request->pincode;
        $area->city_id = $request->city;
        $area->save();
        return redirect()->route('area.index');
    }
    public function delete(Request $request)
    {
        $area = Area::find($request->id);

        return !$request->id ? response()->json(['error' => 'ID is required.'], 400) :
                (!$area ? response()->json(['error' => 'Area not found.'], 404) :
                ($area->delete() && response()->json(['success' => true])));
        }
}
