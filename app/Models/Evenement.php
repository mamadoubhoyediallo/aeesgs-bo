<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_evenements_id',
        'organisateurs_id',
        'libelle',
        'description',
        'adresse',
        'photo',
        'date'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function category_evenements(){
        return $this->belongsTo(CategoryEvenement::class, 'category_evenements_id');
    }
    public function organisateurs(){
        return $this->belongsTo(Organisateur::class, 'organisateurs_id');
    }
}
