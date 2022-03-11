<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client_dechet extends Model{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nom',
        'prenom',
        'CIN',
        'photo',
        'adresse',
        'numero_telephone',
        'email',
        'mot_de_passe',
    ];
    public function commande_dechet()
    {
        return $this->belongsTo(Commande_dechet::class);
    }
    protected $dates=['deleted_at'];

}

