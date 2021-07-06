<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Medicine;
use App\Models\MedicineSymptom;
use App\Models\Brand;

class HomePageController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('homepage')->withMedicines($medicines);
    }


    public function singlePage(Medicine $medicine)
    {

        $altMedicines = Medicine::where('salt_id', $medicine->salt_id)->where('id', '!=' , $medicine->id)->get();

        return view('single-page')->withMedicine($medicine)->withaltMedicines($altMedicines);
    }
}
