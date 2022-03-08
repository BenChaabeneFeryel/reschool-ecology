<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responsable_etablissement extends Model{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nom',
        'prenom',
        'CIN',
        'photo',
        'email',
        'mot_de_passe',
        'numero_telephone',
    ];

    public function etablissement(){
        return $this->belongsTo(etablissement::class);
    }
    protected $dates=['deleted_at'];

}
