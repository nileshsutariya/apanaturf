<?php

namespace App\Http\Controllers\admin;

use App\Models\Area;
use App\Models\Venues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VenuesController extends Controller
{
    public function index(Request $request){
        $venues=Venues::paginate(10);
        $city = DB::table('city')->get();
        $area = $request->city ? Area::where('city_id', $request->city)->get() : Area::all();
        return view('admin.venues.venues',compact('venues','city','area'));
    }
}
