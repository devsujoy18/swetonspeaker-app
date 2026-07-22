<?php

namespace App\Http\Controllers;

use App\Models\Tsparameter;
use Illuminate\Http\Request;

class TsparameterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tsparameters = Tsparameter::all();
        return view('tsparameter.index', compact('tsparameters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tsparameter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>  'required',
            'order_no' => 'required|numeric|unique:tsparameters,order_no',
        ]);

        Tsparameter::create([
            'name' => $request->name,
            'order_no' => $request->order_no
        ]);

        return redirect()->route('tsparameter.index')->with('success', 'Data added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tsparameter $tsparameter)
    {
        return view('tsparameter.edit', compact('tsparameter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tsparameter $tsparameter)
    {
        $request->validate([
            'name' =>  'required',
            'order_no' => 'required|numeric|unique:tsparameters,order_no,'.$tsparameter->id,
        ]);

        $tsparameter->name = $request->name;
        $tsparameter->order_no = $request->order_no;
        $tsparameter->save();

        return redirect()->route('tsparameter.index')->with('success', 'Data added successfully');
    }

    public function change_status($id){
        $tsparameter = Tsparameter::find($id);
        $tsparameter->status = ($tsparameter->status == 1) ? 0 : 1;
        $tsparameter->save();
        return redirect()->route('tsparameter.index')->with('success', 'Status updated successfully');
    }
}
