@extends('layouts.app')

@section('content')
    <div class="container w-50 my-5">
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form id="contactForm" action="{{ route('arac-talep-guncelle', $carRequest->id) }}" method="post" class="needs-validation">
                    @csrf
                    @method('PUT')
                    <!-- Form içeriği buraya gelecek -->
                    <div class="mb-3 row">
                        <div class="col-md-4">
                            <label class="form-label" for="alisYeri">Alış Yeri</label>
                            <input class="form-control" id="alisYeri" name="alisYeri" type="text" placeholder="Alış Yeri" value="{{ $carRequest->alisYeri }}"  />
                            <div class="invalid-feedback">Alış Yeri is required.</div>
                        </div>

                <div class="col-md-4">
                    <label class="form-label" for="alisTarihi">Alış Tarihi</label>
                    <input class="form-control" id="alisTarihi" name="alisTarihi" type="date" placeholder="Alış Tarihi" value="{{ $carRequest->alisTarihi }}"   />
                    <div class="invalid-feedback">Alış Tarihi is required.</div>
                </div>

                <div class="col-md-4">
                    <label class="form-label" for="alisSaati">Gidiş</label>
                    <input class="form-control" id="alisSaati" name="alisSaati" type="time" placeholder="Gidiş" value="{{ $carRequest->alisSaati }}"  />
                    <div class="invalid-feedback">Gidiş is required.</div>
                </div>
            </div>

            <div class="mb-3 row">
            <div class="col-md-4">
                <label class="form-label" for="teslimYeri">Teslim Yeri</label>
                <input class="form-control" id="teslimYeri" name="teslimYeri" type="text" placeholder="Teslim Yeri" value="{{ $carRequest->teslimYeri }}"  />
                <div class="invalid-feedback">Bırakış Yeri is required.</div>
            </div>

            <div class="col-md-4">
                <label class="form-label" for="teslimTarihi">Teslim Tarihi</label>
                <input class="form-control" id="teslimTarihi" name="teslimTarihi" type="date" placeholder="Teslim Tarihi"  value="{{ $carRequest->teslimTarihi }}" />
                <div class="invalid-feedback">Teslim Tarihi is required.</div>
            </div>

            <div class="col-md-4">
                <label class="form-label" for="teslimSaati">Dönüş</label>
                <input class="form-control" id="teslimSaati" name="teslimSaati" type="time" placeholder="Dönüş"  value="{{ $carRequest->teslimSaati }}" />
                <div class="invalid-feedback">Dönüş is required.</div>
            </div>
        </div>


            <div class="mb-3">
                <label class="form-label" for="firma">Firma</label>
                <select class="form-select" id="firma" name="firma" aria-label="Firma" value="{{ $carRequest->firma }}" >
                    <option value="Avis">Avis</option>
                    <option value="Garenta">Garenta</option>
                    <option value="Sixt">Sixt</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="aciklama">Açıklama</label>
                <textarea class="form-control" id="aciklama" name="aciklama" type="text" placeholder="Açıklama" style="height: 10rem;" ></textarea>
                <div class="invalid-feedback">Açıklama is required.</div>
            </div>
            </div>
                    <!-- Düzenleme butonu -->
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Düzenle ve Gönder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection