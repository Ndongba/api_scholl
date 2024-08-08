<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[];

    public function Etudiant(){

        return $this->belongsTo((Etudiant::class));
    }


    public function matiere(){

        return $this->belongsTo(Matiere::class);
    }
}
