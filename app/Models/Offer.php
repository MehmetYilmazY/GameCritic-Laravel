<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['car_request_id', 'teklif_baslik', 'genel_bilgiler', 'fiyat','doviz'];

    public function carRequest()
    {
        return $this->belongsTo(CarRequest::class, 'car_request_id');
    }
}
