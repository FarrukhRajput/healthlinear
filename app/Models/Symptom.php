<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    // protected $with = ['medicines'];


    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'medicine_symptom');
    }

}
