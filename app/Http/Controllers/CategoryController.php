<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(){
        $categories=Category::all();
        return view('category.list', compact('categories'))->with('name', "category");
    }
    public function create(){
        return view('category.create') ;
    }
    public function store(Request $request){
        $category=new Category();
        $this->validateCategoryInput($request, $category);
        return redirect()->route('category_list')->with('success','category added success');
    }

    public function  edit($id){
        return view('category.edit', ['category'=>Category::find($id)]);
    }
    public function update(Request $request, $id){
        $category=Category::find($id);
        $this->validateCategoryInput($request, $category);
        return redirect()->route('category_list')->with('success','category added success');
    }
    public function delete($id){
        $category=Category::find($id);
        if($category){
            $category->delete();
            return redirect('/')->with('success', "delete success");
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    public function getCategoryValidate(Request $request, Category $category): void
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:png,jpeg,svg'
        ]);
        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->status=(bool)$request->input('status');
        $category->save();
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return void
     */
    public function validateCategoryInput(Request $request, Category $category): void
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:png,jpeg,svg'
        ]);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->status = (bool)$request->input('status');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $fileName);
            $category->image_name = $fileName;
        }
        $category->save();

    }
}
