<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisateur extends Model
{
    use HasFactory;
    public function evenements(){
        return $this->hasMany(Evenement::class);
    }
    protected $fillable = [
        'libelle'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
