<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


use App\Models\Brand;
use App\Models\Country;



class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::with('country')->get();

        return view('dashboard.brand-table')->with( [
            'brands' => $brands
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $brand = new Brand();
        $countries = Country::all();
        return view('dashboard.brand-form')->withCountries( $countries )->withBrand( $brand );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:brands,name',
            'country_id' => 'required',
            'logo' => 'required|mimes:jpeg,png'
        ]);


        $brand = new Brand();

        $brand->name = $request->name;

        $brand->slug = str_replace(' ' , '-' , $brand->name);

        $brand->country_id = $request->country_id;

        $image = $request->file('logo');

        $fileName = time() . '.webp';

        Image::make($image)->fit(100)
            ->encode('webp' , 75)
            ->save(storage_path('app/public/' . $fileName));

        $brand->image_url = 'storage/'.$fileName;

        if( $request->website_url ){
            $brand->website_url = $request->website_url;
        }

        if( $request->description){
            $brand->description = $request->description;
        }

        $brand->save();

        return redirect()->back()->withMessage('Brand Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $countries = Country::all();
        return view('dashboard.brand-form')
            ->withBrand($brand)
            ->withCountries($countries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {

        // dd('required|unique:brands,name,' . $brand->name);
        $request->validate([
            'name' => "required|unique:brands,name,$brand->id",
            'country_id' => 'required'
        ]);

        $brand->name = $request->name;

        $brand->slug = str_replace( ' ', '-' ,$request->name);

        $brand->country_id = $request->country_id;

        // update the image if updated
        if($request->logo){
            dd("update image");
        }

        if( $request->website_url ){
            $brand->website_url = $request->website_url;
        }

        if( $request->description){
            $brand->description = $request->description;
        }

        $brand->save();

        return redirect()->route('brand.index')->withMessage('Brand Updated Succesfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brand.index')->withMessage('Brand Delete Succesfully.');
    }
}
