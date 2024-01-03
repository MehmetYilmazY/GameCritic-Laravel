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
                            <h5>Araç Kiralama Şirketi</h4>
                            <p class="fw-bold">{{ $carRequest->firma }}</p>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <h5>Alış Yeri</h4>
                            <p class="fw-bold">{{ $carRequest->alisYeri }}</p>
                        </div>
                        <div class="col">
                            <h5>Bırakış Yeri</h4>
                            @if(!empty($carRequest->teslimYeri))
                            <p class="fw-bold">{{ $carRequest->teslimYeri }}</p>
                            @else
                            <p class="fw-bold">{{ $carRequest->alisYeri }}</p>
                            @endif
                        </div>
                        <div class="col">
                            <h5>Talep Tarihi</h4>
                            <p class="fw-bold">{{ $carRequest->created_at }}</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <h5>Alış Tarihi</h5>
                            @if(!empty($carRequest->alisTarihi))
                            <p class="fw-bold">{{ $carRequest->alisTarihi }} {{ $carRequest->alisSaati }}</p>
                            @else
                            <p class="fw-bold">{{ $carRequest->teslimTarihi }} {{ $carRequest->teslimSaati }}</p>
                            @endif
                        </div>
                        <div class="col">
                            <h5>Bırakış Tarihi</h5>
                            <p class="fw-bold">{{ $carRequest->teslimTarihi }} {{ $carRequest->teslimSaati }}</p>
                        </div>
                        <div class="col">
                            <h5>Talep Güncelleme Tarihi</h5>
                            <p class="fw-bold">{{ $carRequest->updated_at }}</p>
                        </div>
                    </div>

                    <div class="row inline">
                    <div class="col mt-3">
                        <h5>Açıklama</h5>
                        <p class="fw-bold">{{ $carRequest->aciklama }}</p>
                    </div>

                    <div class="col mt-3">
                            <h5>Talep Sorumlusu</h5>
                            <p class="fw-bold">Mehmet Yılmaz</p>
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
            @if($teklifler->isNotEmpty())
                        <div class="card mt-4">
                            <div class="card-header">
                                <h5 class="card-title">Teklifler</h5>
                            </div>
                            <div class="card-body">
                                @foreach($teklifler as $teklif)
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="https://app.hisgo.com.tr/assets/img/no-image.png" alt="Teklif Görseli" class="img-fluid" width="200" height="150">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title" id="teklifBaslik">{{ $teklif->teklif_baslik }}</h5>
                                                <p class="card-text" id="genelBilgiler">{{ $teklif->genel_bilgiler }}</p>
                                                <h5 class="card-title">Fiyat</h5>
                                                <p class="card-text">{{ $teklif->fiyat }} -{{ $teklif->doviz }} </p>
                                                <div class="col-md-2">
                                                @if($teklif->onay_durumu != 'onaylandi')
                {{-- Kullanıcının daha önceki bir teklifi onaylamış mı kontrol et --}}
                @php
                    $userPreviouslyAcceptedOffer = auth()->user()->offers()->where('onay_durumu', 'onaylandi')->exists();
                @endphp

                {{-- Kullanıcı daha önceki bir teklifi onaylamışsa butonu devre dışı bırak --}}
                @if($userPreviouslyAcceptedOffer)
                    <button class="btn btn-success" disabled>Önceki Teklif Onaylandı</button>
                @else
                    <form action="{{ route('teklif.onayla', $teklif->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Onayla</button>
                    </form>
                @endif
            @else
                <button class="btn btn-success" disabled>Onaylandı</button>
            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    @endif

            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Teklif Ekle</button>

            <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Teklif Ekle</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('teklif.kaydet', $carRequest->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="teklifBaslikInput" class="form-label">Teklif Başlığı:</label>
                        <input type="text" class="form-control" id="teklifBaslikInput" name="teklif_baslik" required>
                    </div>
                    <div class="mb-3">
                        <label for="genelBilgilerInput" class="form-label">Genel Bilgiler:</label>
                        <textarea class="form-control" id="genelBilgilerInput" name="genel_bilgiler" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fiyat" class="form-label">Fiyat:</label>
                        <input type="text" class="form-control" id="fiyat" name="fiyat" required>
                    </div>
                    <div class="mb-3">
                        <label for="doviz" class="form-label">Döviz Türü:</label>
                        <select class="form-select" id="doviz" name="doviz" required>
                            <option value="TRY">TRY - Türk Lirası</option>
                            <option value="EUR">EUR - Euro</option>
                            <option value="USD">USD - Amerikan Doları</option>
                            <option value="GBP">GBP - İngiliz Sterlini</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Teklif Ekle</button>
                </form>                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                                </div>
                            </div>
                        </div>
            </div>
                    
                </div>
            </div>
        </div>
        @endsection

@section('scripts')
<script>
</script>
@endsection