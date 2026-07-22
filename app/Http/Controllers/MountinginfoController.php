<?php

namespace App\Http\Controllers;

use App\Models\Mountinginfo;
use Illuminate\Http\Request;

class MountinginfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mountinginfos = Mountinginfo::all();
        return view('mountinginfo.index', compact('mountinginfos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mountinginfo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>  'required',
            'order_no' => 'required|numeric|unique:mountinginfos,order_no',
        ]);

        Mountinginfo::create([
            'name' => $request->name,
            'order_no' => $request->order_no
        ]);

        return redirect()->route('mountinginfo.index')->with('success', 'Data added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mountinginfo $mountinginfo)
    {
        return view('mountinginfo.edit', compact('mountinginfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mountinginfo $mountinginfo)
    {
        $request->validate([
            'name' =>  'required',
            'order_no' => 'required|numeric|unique:mountinginfos,order_no,'.$mountinginfo->id,
        ]);

        $mountinginfo->name = $request->name;
        $mountinginfo->order_no = $request->order_no;
        $mountinginfo->save();

        return redirect()->route('mountinginfo.index')->with('success', 'Data added successfully');
    }

    public function change_status($id){
        $mountinginfo = Mountinginfo::find($id);
        $mountinginfo->status = ($mountinginfo->status == 1) ? 0 : 1;
        $mountinginfo->save();
        return redirect()->route('mountinginfo.index')->with('success', 'Status updated successfully');
    }
}
