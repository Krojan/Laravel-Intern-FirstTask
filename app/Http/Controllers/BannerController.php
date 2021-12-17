<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function list(){
        $banners=Banner::all();
        return view('banner.list', compact('banners'))->with('name', "banner");
    }
    public function create(){
        return view('banner.create');
    }
    public  function store(Request $request){
        $banner=new Banner();
        $this->validateBannerInput($request, $banner);
        return redirect()->route('banner_list')->with('success','banner added success');
    }
    public function edit($id){
        $banner=Banner::find($id);
        $start_date = str_replace(' ', 'T', $banner->start_date);
        $end_date = str_replace(' ', 'T', $banner->end_date);
        return view('banner.edit')->with('banner', $banner)->with('start_date',$start_date)->with('end_date', $end_date);
    }
    public function update(Request  $request, $id){
        $banner=Banner::find($id);
        $this->validateBannerInput($request, $banner);
        return redirect()->route('banner_list')->with('success','banner added success');
    }
    public function delete($id){
        $banner=Banner::find($id);
        if($banner){
            $banner->delete();
            return redirect('/')->with('success', "deleted successfully");
        }
    }

    /**
     * @param Request $request
     * @param Banner $banner
     * @return void
     */
    public function validateBannerInput(Request $request, Banner $banner): void
    {
        $start_date = str_replace('T', ' ', $request->start_date);
        $end_date = str_replace('T', ' ', $request->end_date);
        $request->validate([
            'name' => 'required',
            'url' => 'required|max:255',
            'image' => 'required| mimes:jpeg,png,svg',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $fileName);
            $banner->image_name = $fileName;
        }

        $banner->name = $request->name;
        $banner->url = $request->url;
        $banner->start_date = $start_date;
        $banner->end_date = $end_date;
        $banner->product_id = Product::first()->id;
        $banner->save();
    }
}
