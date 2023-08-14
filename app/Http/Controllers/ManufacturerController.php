<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manufacturers = Manufacturer::get();
        return view('admin.manufacturer.index', compact('manufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manufacturer.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:manufacturers',
            
            'description'=>'required',
            'image'=>'required',
        ]);

        $image = $request->file('image')->store('public/files');
        Manufacturer::create([
            'name'=>$request->name,
            
            'description'=>$request->description,
            'image'=>$image,
            
        ]);
        notify()->success('Manufacturer added successfully'); 

        return redirect()->route('manufacturer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $manufacturer = Manufacturer::find($id);
        return view('admin.manufacturer.edit', compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'=>'required',
            
            'description'=>'required',
            'image'=>'required',
        ]);

        $manufacturer = Manufacturer::find($id);
        $image=$manufacturer->image;
        // dd($manufacturer);
        if($request->file('image')){
            \Storage::delete($image);
            $image = $request->file('image')->store('public/files');  
            // \Storage::delete($image);
        }

        $manufacturer->name = $request->name;
        $manufacturer ->description=$request->description;
        $manufacturer ->image=$image;
        $manufacturer->save();
        notify()->success('Manufacturer updated successfully'); 

        return redirect()->route('manufacturer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $manufacturer = Manufacturer::find($id);
        
        // dd($manufacturer);
        $manufacturer->delete();
        
        notify()->success('Manufacturer deleted successfully'); 

        return redirect()->route('manufacturer.index');
    }
}
