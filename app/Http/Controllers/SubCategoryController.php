<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subcategories = Subcategory::get();
        return view('admin.subCategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.subCategories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:subcategories',
            
            'description'=>'required',
        ]);

        SubCategory::create([
            'name'=>$request->name,
            
            'description'=>$request->description,
            
        ]);
        notify()->success('Subcategory added successfully'); 

        return redirect()->route('sub.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $subcategory = Subcategory::find($id);
        return view('admin.subCategories.edit', compact('subcategory'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'=>'required',
            
            'description'=>'required',
        ]);

        $subcategory = SubCategory::find($id);
        $subcategory->name = $request->name;
        $subcategory ->description=$request->description;
        $subcategory->save();
        notify()->success('SubCategory updated successfully'); 

        return redirect()->route('sub.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = SubCategory::find($id);
        
        // dd($subCategory);
        $subCategory->delete();
        
        notify()->success('SubCategory deleted successfully'); 

        return redirect()->route('sub.index');
    }
} 
