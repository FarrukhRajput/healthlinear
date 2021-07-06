<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $with = ['salt'];

    public function salt()
    {
        return $this->belongsTo(Salt::class);
    }

    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class);
    }

}
