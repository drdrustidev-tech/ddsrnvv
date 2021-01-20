<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;
use Auth;

class CatagoryController extends Controller
{


    public function __construct()
    {
        //$this->middleware('auth');        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Catagory::all();
        return view('catagory.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('catagory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name'    =>  'required'
            
            
        ]);
        
        $form_data = array(
            'name'      =>   $request->name,
            //'created_by'  =>   Auth::user()->id,
            //'updated_by'  =>   Auth::user()->id   
           
            
        );
        Catagory::create($form_data);
        return redirect('catagory')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function show(Catagory $catagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function edit(Catagory $catagory)
    {
        //
        $data = $catagory;
        //echo($data);
        return view('catagory.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catagory $catagory)
    {
        //
        $this->validate($request, [
            'name'     =>  'required'
           
           
        ]);
        $form_data = array(
            'name'      =>   $request->name,
            //'updated_by'  =>   Auth::user()->id
            

                     
        );
        $catagory->update($form_data);
        return redirect()->route('catagory.index')
                        ->with('success','Catagory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catagory $catagory)
    {
        //
    }
}
