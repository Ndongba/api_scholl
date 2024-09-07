<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

     protected $guard = [];


    public function evaluation(){

        return $this->hasMany(Evaluation::class);
    }
}
