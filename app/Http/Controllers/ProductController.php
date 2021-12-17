<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    public function list(){
        $products=Product::all();
//        $columns= Schema::getColumnListing('Products');
//        dd($columns);
        return view ('product.list', compact('products'))->with('name', "product");
    }
    public function create(){
        return view('product.create');
//        $product=Product::factory()->create();
//        echo 'Product created successfully with product id=' .$product->id;
    }
    public function store(Request $request): string
    {
//        ddd($request->hasFile('image'));
        $this->getProductValidate($request);
        $product=new Product();
        $this->saveImage($request, $product);

        $product->category_id=Category::first()->id;
        $this->productSave($request, $product);
        return redirect('/')->with("success", "Product added successfully");
    }
    public function edit($id){
        return view('product.edit', ['product'=>Product::find($id)]);
    }
    public function update(Request $request, $id){

        $product=Product::find($id);
        $this->getProductValidate($request);
        $this->saveImage($request, $product);
        $this->productSave($request, $product);
        return redirect()->route('product_list')->with('success','update successful');
        dd($product);

    }
    public  function delete($id){
        $product=Product::find($id);
        if($product){
            $product->delete();
            return redirect('/')->with('success', "delete success");
        }
    }

    /**
     * @param Request $request
     * @param $product
     * @return void
     */
    public function productSave(Request $request, $product): void
    {
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->status = (bool)$request->input('status');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();
    }

    /**
     * @param Request $request
     * @return void
     */
    public function getProductValidate(Request $request): void
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required ',
            'image' => 'mimes:jpeg,jpg,png,gif | required | max:10000',
            'description' => 'required'
        ]);
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return void
     */
    public function saveImage(Request $request, Product $product): void
    {
        if ($request->hasFile('image')) {
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $imageName = time() . '.' . $fileExtension;
            $request->file('image')->move(public_path('images'), $imageName);
            $product->image_name = $imageName;
        }
    }
}
