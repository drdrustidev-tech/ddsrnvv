<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Page::all();
        return view('pages.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $catagories = Catagory::all();   
       // return view('pages.create');
        return view('pages.create', compact('catagories'));
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
        $request->validate([
            'tittle' => 'required',
            'slug' => 'required',
            'catagory_id' => 'required',
            'body' => 'required'                    

        ]);

        $form_data = array(
            'tittle'  =>   $request->tittle,
            'slug'  =>   $request->slug,
            'catagory_id'  =>   $request->catagory_id,
            'body'  =>   $request->body, 
            'created_by'  =>   Auth::user()->id,
            'updated_by'  =>   Auth::user()->id          
            
        );
        //dd($form_data);

        Page::create($form_data);
        return redirect()->route('page.index')
                        ->with('success','Page created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
        $data = $page;
        //echo($data);
        return view('pages.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
        $request->validate([
            'tittle' => 'required',
            'slug' => 'required',
            'catagory_id' => 'required',
            'body' => 'required'                   

        ]);

        $form_data = array(
            'tittle'  =>   $request->tittle,
            'slug'  =>   $request->slug,
            'catagory_id'  =>   $request->catagory_id,
            'body'  =>   $request->body,            
            'updated_by'  =>   Auth::user()->id          
            
        );
       //dd($form_data);
        $page->update($form_data);       
        return redirect()->route('page.index')
                        ->with('success','Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }

    public function loadpages($pgname)
    {
        //
        $data = Page::where('slug', $pgname)               
               ->get();
        //$pagename = "pages.".$pgname;
       // $data = $page;
        //echo($data);
        return view('pages.'.$pgname, compact('data'));
    }









}
