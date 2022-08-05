<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    public function  contact()
    {
        return $this->hasMany(Contact::class);
    }
    public function  company()
    {
        return $this->hasMany(company::class);
    }
    public function  Degree()
    {
        return $this->hasMany(Degree::class);
    }


    public function detail()
    {
        return $this->hasMany(Detail::class);
    }


}
