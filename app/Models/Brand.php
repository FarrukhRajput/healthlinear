<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;



    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function symptoms()
    {
        return $this->hasMany(MedicineSymptom::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }




}
