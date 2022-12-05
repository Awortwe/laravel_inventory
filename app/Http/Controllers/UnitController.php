<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::latest()->get();
        return view('backend.units.index', compact('units'));
    }

    public function create()
    {
        return view('backend.units.create');
    }

    public function store(Request $request)
    {
        Unit::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Unit inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('units.index')->with($notification);
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('backend.units.edit', compact('unit'));
    }

    public function update(Request $request)
    {
        $unitId = $request->id;
        Unit::findOrFail($unitId)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Unit updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('units.index')->with($notification);
    }

    public function delete($id)
    {
        Unit::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Unit deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
