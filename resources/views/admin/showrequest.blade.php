@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">Araç Talep Detayları</div>
                <div class="card-body">
                    <div class="flex-shrink-0 dropdown">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none" aria-expanded="false">
                            <img src="https://cdn.pixabay.com/photo/2012/04/26/19/43/profile-42914_1280.png" alt="pp" width="32" height="32" class="rounded-circle">
                            <h6 class="d-inline fw-bold">{{ $carRequest->kullaniciName }}</h6>
                        </a>
                    </div>

                    <br>

                    <!-- Diğer detayları buraya ekleyin -->
                    <div class="row">
                            <h4>Araç Kiralama Şirketi</h4>
                            <h5 class="fw-bold">{{ $carRequest->firma }}</h5>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <h4>Alış Yeri</h4>
                            <h5 class="fw-bold">{{ $carRequest->alisYeri }}</h5>
                        </div>
                        <div class="col">
                            <h4>Bırakış Yeri</h4>
                            @if(!empty($carRequest->teslimYeri))
                            <h5 class="fw-bold">{{ $carRequest->teslimYeri }}</h5>
                            @else
                            <h5 class="fw-bold">{{ $carRequest->alisYeri }}</h5>
                            @endif
                        </div>
                        <div class="col">
                            <h4>Talep Tarihi</h4>
                            <h5 class="fw-bold">{{ $carRequest->created_at }}</h5>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <h4>Alış Tarihi</h4>
                            @if(!empty($carRequest->alisTarihi))
                            <h5 class="fw-bold">{{ $carRequest->alisTarihi }} {{ $carRequest->alisSaati }}</h5>
                            @else
                            <h5 class="fw-bold">{{ $carRequest->teslimTarihi }} {{ $carRequest->teslimSaati }}</h5>
                            @endif
                        </div>
                        <div class="col">
                            <h4>Bırakış Tarihi</h4>
                            <h5 class="fw-bold">{{ $carRequest->teslimTarihi }} {{ $carRequest->teslimSaati }}</h5>
                        </div>
                        <div class="col">
                            <h4>Talep Güncelleme Tarihi</h4>
                            <h5 class="fw-bold">{{ $carRequest->updated_at }}</h5>
                        </div>
                    </div>

                    <div class="row inline">
                    <div class="col mt-3">
                        <h4>Açıklama</h4>
                        <h5 class="fw-bold">{{ $carRequest->aciklama }}</h5>
                    </div>

                    <div class="col mt-3">
                            <h4>Talep Sorumlusu</h4>
                            <h5 class="fw-bold">Mehmet Yılmaz</h5>
                        </div>
                        </div>
                    <div class="mt-4">
                        <div class="d-flex flex-row justify-content-between">
                            <a href="{{ route('admin.listrequest') }}" class="btn btn-secondary">Listeye Geri Dön</a>
                            <a href="{{ route('admin.aracedit', $carRequest->id) }}" class="btn btn-primary">Düzenle</a>
                            <form action="{{ route('admin.aracdelete', $carRequest->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Sil</button>
                            </form>
                        </div>
                    </div>

                    <hr>
                    <div class="mt-4">
                        <h4># Bize Ulaşın</h4>
                        @foreach($comments as $comment)
                        <div class="mb-2">
                            <div class="border p-3">
                            <strong>{{ $comment->user_name }} - {{ $comment->email }}</strong>: {{ $comment->comment }}
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Yorum Ekleme Formu -->
                    <form action="{{ route('comment.add', $carRequest->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="comment" class="form-label mt-2">Mesaj:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Mesaj Ekle</button>
                    </form>
                </div>
            </div>
             <!-- Teklif Kartı -->
             <div class="card mt-4">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://app.hisgo.com.tr/assets/img/no-image.png" alt="Teklif Görseli" class="img-fluid" width="200" height="150">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Teklif Başlığı</h5>
                                    <p class="card-text">CDAR DENEME1 BENZINLI-OTOMATIK OPEL MOKKA, CROSSLAND VB.</p>
                                    <h5 class="card-title">Genel Bilgiler</h5>
                                    <p class="card-text">Bilgi Yok</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button href="#" class="btn btn-primary mt-2">Teklif Ekle</button>

                    
                </div>
            </div>
        </div>
        @endsection
