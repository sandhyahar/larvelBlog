<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\User;
use App\Http\View;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
        $pages = Page::paginate(10);

       if($request->has('view_deleted'))
       {
            $pages = Page::onlyTrashed()->get();
       }
        
        return view('admin.index', compact('pages'))->with('i', (request()->input('page', 1) - 1) * 10);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'body' => 'required',
        ]);
        
        $input = $request->all();

        if ($image = $request->file('feature_image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['feature_image'] = "$profileImage";
        }

        
            Page::create($input);
            
             return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        return view('admin.show',compact('page'));
    }

    public function show1($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $pages = Page::where('slug', $slug)->first();
 
        
        if(!is_null($page) && $page->status == "Public")
        {
            
             return view('admin.show1', ['page' => $page]);
        
        }
        elseif(!is_null($pages) && $pages->status == "Trash")
        {
          
             return redirect()->route('pages.trashed');
        
        }
        elseif(!is_null($pages) && $pages->status == "Draf")
        {
          
              return abort(404);
        }
        
       
        
   }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        
        if ($image = $request->file('feature_image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['feature_image'] = "$profileImage";
        }else{
            unset($input['feature_image']);
        }
          
                $page = Page::find($id);

                $page->update($input);

                return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
  
        return redirect()->route('pages.index')->with('success','Product deleted successfully');
    }

    public function trashed()
    {
        $pages = Page::onlyTrashed()->get();
        
        return view('admin.trashed',compact('pages'));
    }

    public function trashedDelete($id)
    {
        $pages = Page::onlyTrashed()->findOrFail($id);
        $pages->forceDelete();
        return back();
    }

    public function all()
    {
        $pages = Page::withTrashed()->get();
        
        return view('admin.all',compact('pages'));
    }

    public function public()
    {
        
        // $pages = Page::where('status', 'Public')->get();
        $pages = Page::where('status', 'public')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        return view('admin.public',compact('pages'));

        
    }

    public function draf(Request $request)
    {
        $pages = Page::where('status', 'Draft')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('admin.draf',compact('pages'));
    }

    

    
}
