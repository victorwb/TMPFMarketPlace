<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maincategory;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $maincategories = Maincategory::get();
        return view('admin.mainCategories.index', compact('maincategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.mainCategories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:maincategories',
            
            'description'=>'required',
        ]);

        MainCategory::create([
            'name'=>$request->name,
            
            'description'=>$request->description,
            
        ]);
        notify()->success('Maincategory added successfully'); 

        return redirect()->route('main.index');
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
        
        $maincategory = Maincategory::find($id);
        return view('admin.mainCategories.edit', compact('maincategory'));
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

        $maincategory = MainCategory::find($id);
        $maincategory->name = $request->name;
        $maincategory ->description=$request->description;
        $maincategory->save();
        notify()->success('MainCategory updated successfully'); 

        return redirect()->route('main.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mainCategory = MainCategory::find($id);
        
        // dd($mainCategory);
        $mainCategory->delete();
        
        notify()->success('MainCategory deleted successfully'); 

        return redirect()->route('main.index');
    }
} 
