<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryEvenement extends Model
{
    use HasFactory;
    public function evenement(){
        return $this->hasMany(Evenement::class);
    }
    protected $fillable = [
        'libelle'
    ];
}
