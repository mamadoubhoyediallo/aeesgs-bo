<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_evenements_id',
        'libelle',
        'description',
        'adresse',
        'photo',
        'date'
    ];
    public function category_evenements(){
        return $this->belongsTo(CategoryEvenement::class, 'category_evenements_id');
    }
}
