<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Ouvrier extends Model{
    use HasFactory,  SoftDeletes;
    protected $fillable = [
        'id_etablissement',
        'id_camion',
        'poste',
        'qrcode',
        'nom',
        'prenom',
        'CIN',
        'photo',
        'numero_telephone',
        'email',
        'mot_de_passe',
    ];
    public function camion(){
        return $this->hasOne(Camion::class);
    }

    public function etablissement(){
        return $this->belongsTo(Etablissement::class);
    }
    protected $dates=['deleted_at'];
}

