<?php

namespace App\Http\Controllers;

use App\Models\Reconkit;
use Illuminate\Http\Request;

class ReconkitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reconkits = Reconkit::all();
        return view('reconkit.index', compact('reconkits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reconkit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>  'required',
            'order_no' => 'required|numeric|unique:reconkits,order_no',
        ]);

        Reconkit::create([
            'name' => $request->name,
            'order_no' => $request->order_no
        ]);

        return redirect()->route('reconkit.index')->with('success', 'Data added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reconkit $reconkit)
    {
        return view('reconkit.edit', compact('reconkit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reconkit $reconkit)
    {
        $request->validate([
            'name' =>  'required',
            'order_no' => 'required|numeric|unique:reconkits,order_no,'.$reconkit->id,
        ]);

        $reconkit->name = $request->name;
        $reconkit->order_no = $request->order_no;
        $reconkit->save();

        return redirect()->route('reconkit.index')->with('success', 'Data added successfully');
    }

    public function change_status($id){
        $reconkit = Reconkit::find($id);
        $reconkit->status = ($reconkit->status == 1) ? 0 : 1;
        $reconkit->save();
        return redirect()->route('reconkit.index')->with('success', 'Status updated successfully');
    }
}
