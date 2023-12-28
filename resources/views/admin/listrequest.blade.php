@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header text-center font-weight-bold">
                            Araç Talep Formu - HisKobi
                        </div>
                        
                        <div class="card-body">
                            <!-- Talepleri listeleyen tablo -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" summary="List of requests">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Ad Soyad</th>
                                        <th>Alış Yeri</th>
                                        <th>Alış Tarihi</th>
                                        <th>Alış Saati</th>
                                        <th>Teslim Yeri</th>
                                        <th>Teslim Tarihi</th>
                                        <th>Teslim Saati</th>
                                        <th>Firma</th>
                                        <th>Aracı Teslim Edecek Mi?</th>
                                        <th>Mail Gönderilecek Kişi</th>
                                        <th>Açıklama</th>
                                        <th>KVKK'yı Onayladı mı?</th>
                                        <th>Oluşturulma Tarihi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($listrequests as $listrequest)
                                        <tr>
                                            <td>{{ $listrequest->id }}</td>
                                            <td>{{ $listrequest->kullaniciName }}</td>
                                            <td>{{ $listrequest->alisYeri }}</td>
                                            <td>{{ $listrequest->alisTarihi }}</td>
                                            <td>{{ $listrequest->alisSaati }}</td>
                                            <td>{{ $listrequest->teslimYeri }}</td>
                                            <td>{{ $listrequest->teslimTarihi }}</td>
                                            <td>{{ $listrequest->teslimSaati }}</td>
                                            <td>{{ $listrequest->firma }}</td>
                                            <td>{{ $listrequest->teslimEdilecek }}</td>
                                            <td>{{ $listrequest->mailGonderilecekKisi }}</td>
                                            <td>{{ $listrequest->aciklama }}</td>
                                            <td>{{ $listrequest->kvkkForm }}</td>
                                            <td>{{ $listrequest->created_at }}</td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Henüz talep bulunmamaktadır.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
