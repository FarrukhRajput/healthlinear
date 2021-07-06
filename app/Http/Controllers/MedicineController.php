<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\Medicine;
use App\Models\Salt;
use App\Models\Country;
use App\Models\Symptom;
use App\Models\MedicineSymptom;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $medicines = Medicine::all();

        return view('dashboard.medicine-table')->withMedicines( $medicines );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicine = new Medicine();
        $salts = Salt::all();
        $countries = Country::all();
        $symptoms = Symptom::all();

        return view('dashboard.medicine-form')
            ->withMedicine( $medicine )
            ->withSalts( $salts )
            ->withCountries( $countries )
            ->withSymptoms( $symptoms );

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
            'name' => 'required|unique:medicines,name',
            'salt_id' => 'required',
            'symptoms' => 'required',
        ]);

        $medicine = new  Medicine();

        $medicine->name  = $request->name;
        $medicine->salt_id  = $request->salt_id;
        $medicine->slug = str_replace(' ' , '-' , $medicine->name);


        if($request->country_id){
            $medicine->country_id = $request->country_id;
        }

        if($request->description){
            $medicine->description  = $request->description;
        }

        if($request->image){
            $medicine->image_url = $this->uploadImage($request);
        }

        $medicine->save();

        $medicine->symptoms()->sync($request->symptoms);

        return redirect()->route('medicine.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        $medicine = $medicine;
        $salts = Salt::all();
        $countries = Country::all();
        $symptoms = Symptom::all();

        return view('dashboard.medicine-form')
        ->withMedicine( $medicine )
        ->withSalts( $salts )
        ->withCountries( $countries )
        ->withSymptoms( $symptoms );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {

        $request->validate([
            'name' => 'required|unique:medicines,id,'.$medicine->id,
            'salt_id' => 'required',
            'symptoms' => 'required'
        ]);

        // dd($request->all());

        $medicine->salt_id = $request->salt_id;
        $medicine->name = $request->name;
        $medicine->slug = str_replace(' ' , '-' , $medicine->name);

        if($request->country_id){
            $medicine->country_id = $request->country_id;
        }

        if($request->description){
            $medicine->description  = $request->description;
        }

        if($request->image){

            Storage::disk('public')->delete($medicine->image_url);

            $medicine->image_url = $this->uploadImage($request);
        }


        $medicine->save();

        $medicine->symptoms()->sync($request->symptoms);

        return redirect()->route('medicine.index')->withMessage('Medicine updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }

    protected function uploadImage(Request $request)
    {
        $image = $request->file('image');
        $fileName = time() . '.webp';
        Image::make($image)->fit(100)
            ->encode('webp' , 75)
            ->save(storage_path('app/public/' . $fileName));

        return $fileName;
    }
}
