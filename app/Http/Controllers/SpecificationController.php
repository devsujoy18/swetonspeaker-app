<?php

namespace App\Http\Controllers;

use App\Models\Specification;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specifications = Specification::all();
        return view('specification.index', compact('specifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('specification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>  'required',
            'order_no' => 'required|numeric|unique:specifications,order_no',
        ]);

        Specification::create([
            'name' => $request->name,
            'order_no' => $request->order_no
        ]);

        return redirect()->route('specification.index')->with('success', 'Data added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specification $specification)
    {
        return view('specification.edit', compact('specification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specification $specification)
    {
        $request->validate([
            'name' =>  'required',
            'order_no' => 'required|numeric|unique:specifications,order_no,'.$specification->id,
        ]);

        $specification->name = $request->name;
        $specification->order_no = $request->order_no;
        $specification->save();

        return redirect()->route('specification.index')->with('success', 'Data added successfully');
    }

    public function change_status($id){
        $specification = Specification::find($id);
        $specification->status = ($specification->status == 1) ? 0 : 1;
        $specification->save();
        return redirect()->route('specification.index')->with('success', 'Status updated successfully');
    }
}
