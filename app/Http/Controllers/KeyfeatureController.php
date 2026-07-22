<?php

namespace App\Http\Controllers;

use App\Models\Keyfeature;
use Illuminate\Http\Request;

class KeyfeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyfeatures = keyfeature::all();
        return view('keyfeature.index', compact('keyfeatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('keyfeature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>  'required',
            'order_no' => 'required|numeric|unique:keyfeatures,order_no',
        ]);

        keyfeature::create([
            'name' => $request->name,
            'order_no' => $request->order_no
        ]);

        return redirect()->route('keyfeature.index')->with('success', 'Data added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keyfeature $keyfeature)
    {
        return view('keyfeature.edit', compact('keyfeature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keyfeature $keyfeature)
    {
        $request->validate([
            'name' =>  'required',
            'order_no' => 'required|numeric|unique:keyfeatures,order_no,'.$keyfeature->id,
        ]);

        $keyfeature->name = $request->name;
        $keyfeature->order_no = $request->order_no;
        $keyfeature->save();

        return redirect()->route('keyfeature.index')->with('success', 'Data added successfully');
    }

    public function change_status($id){
        $keyfeature = keyfeature::find($id);
        $keyfeature->status = ($keyfeature->status == 1) ? 0 : 1;
        $keyfeature->save();
        return redirect()->route('keyfeature.index')->with('success', 'Status updated successfully');
    }
}
