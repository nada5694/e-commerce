<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at','asc')->paginate(30);
        // $categories_count = $categories->count();
        // $latest_category = Category::orderBy('name' , 'DESC')->latest()->limit(1)->get();

        return view('Admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories                     = new Category();
        $categories->name               = $request->name;
        $categories->description        = $request->description ;
        $categories->create_user_id     = auth()->user()->id;
        $categories->save();

        return redirect()->route('categories.index')
            ->with(['message' => "($categories->name) - Added successfully!"]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Category::findOrFail($id);

        return view('Admin.categories.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories                 = Category::findOrFail($id);
        $categories->name           = $request->name;
        $categories->description    = $request->description;
        $categories->update_user_id = auth()->user()->id;
        $categories->save();

        return redirect()->route('categories.index')
            ->with(['message' => "($categories->name) - Edited successfully!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete_user_id = auth()->user()->id;
        $categories->delete();

        return redirect()->route('categories.index')
            ->with(['message' => "($categories->name) - Deleted successfully!"]);
    }

    public function delete()
    {
        $categories = Category::orderBy('created_at','asc')->onlyTrashed()->paginate(30);
        return view('Admin.categories.delete',compact('categories'));
    }

    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
        $categories = Category::findOrFail($id);
        return redirect()->route('categories.delete')
            ->with(['message' => "($categories->name) - Restored successfully!"]);
    }

    public function forceDelete($id)
    {
        Category::where('id', $id)->forceDelete();
        return redirect()->route('categories.delete')
            ->with(['message' => "Permanently deleted successfully!"]);
    }
}
