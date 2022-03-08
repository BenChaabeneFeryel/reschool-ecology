<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_commande_dechet extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_commande_dechet',
        'id_dechet',
        'quantite',
    ];
}

