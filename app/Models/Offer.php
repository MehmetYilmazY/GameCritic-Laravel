<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['car_request_id', 'teklif_baslik', 'genel_bilgiler', 'fiyat','doviz','onay_durumu'];

    public function carRequest()
    {
        return $this->belongsTo(CarRequest::class, 'car_request_id');
    }

    public function isAcceptedByUser($userId)
    {
        return $this->where('user_id', $userId)->where('onay_durumu', 'onaylandi')->exists();
    }
}
