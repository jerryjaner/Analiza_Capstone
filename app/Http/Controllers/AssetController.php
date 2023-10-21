<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $searchQuery = $request->input('search');
            $assets = Asset::where(function ($query) use ($searchQuery) {
                    $query->where('materials', 'LIKE', "%$searchQuery%")
                        ->orWhere('unit_price', 'LIKE', "%$searchQuery%")
                        ->orWhere('unit_cost_lbc', 'LIKE', "%$searchQuery%");
                })->get();
            $pagination = false;
        } else {
            $pagination = true;
            $assets = Asset::paginate(5);
        }
        return view('pages.staff.assets',[
            'assets' => $assets,
            'pagination' => $pagination
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'material' => 'required',
            'unit' => 'required',
            'unit_price' => 'nullable|numeric',
            'unit_cost_lbc' => 'nullable|numeric',
        ]);
        $assets = Asset::create([
            'materials' => $request->material,
            'unit' => $request->unit,
            'unit_price' => $request->unit_price,
            'unit_cost_lbc' => $request->unit_cost_lbc,
        ]);

        return redirect()->back()->with('success', 'Material created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'material' => 'required',
            'unit' => 'required',
            'unit_price' => 'nullable|numeric',
            'unit_cost_lbc' => 'nullable|numeric',
        ]);
        $assets = Asset::whereId($id)->update([
            'materials' => $request->material,
            'unit' => $request->unit,
            'unit_price' => $request->unit_price,
            'unit_cost_lbc' => $request->unit_cost_lbc,
        ]);

        return redirect()->back()->with('success', 'Material updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();
        return redirect()->back()->with('success', 'Material deleted successfully');
    }
}
