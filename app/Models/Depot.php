<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Depot extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_zone_depot',
        'id_camion',
        'date_depot',
        'quantite_depose',
        'prix_total',
    ];

    public function zone_depot()
    {
        return $this->belongsTo(Zone_depot::class);
    }

    public function camion()
    {
        return $this->belongsTo(Camion::class);
    }
    protected $dates=['deleted_at'];

}
