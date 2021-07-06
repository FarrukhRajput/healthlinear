<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

use DB;

class MedicineSymptom extends Pivot
{
    use HasFactory;

    protected $table = 'medicine_symptom';

    // protected $fillable = [ 'medicine_id' , 'symptom_id' ];

    // protected $with = ['symptom' , 'medicines'];


    // public function symptom()
    // {
    //     return $this->hasOne(Symptom::class , 'id' , 'symptom_id');
    // }


    // public function medicines()
    // {

    //     DB::enableQueryLog();
    //     $this->hasMany(Medicine::class, 'id' , 'symptom_id');
    //     return DB::getQueryLog();
    // }
}
