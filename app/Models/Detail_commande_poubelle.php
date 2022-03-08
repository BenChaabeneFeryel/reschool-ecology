<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Detail_commande_poubelle extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_commande_poubelle',
        'id_stock_poubelle',
        'quantite',
        'prix_unitaires',
    ];
}

