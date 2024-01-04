<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;
    protected $fillable = ['teslimEdilecek', 'kullaniciName', 'alisYeri','alisTarihi', 'alisSaati', 'teslimYeri', 'teslimTarihi', 'teslimSaati', 'firma', 'mailGonderilecekKisi', 'mailGonderilecekKisi2', 'aciklama', 'kvkkForm'];
}
