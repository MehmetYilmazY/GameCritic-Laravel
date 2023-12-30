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
                                        <th>Açıklama</th>
                                        <th>KVKK'yı Onayladı mı?</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Detay</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($listrequests as $listrequest)
                                        <tr>
                                            <td>{{ $listrequest->id }}</td>
                                            <td>{{ $listrequest->kullaniciName }}</td>
                                            <td>{{ $listrequest->aciklama }}</td>
                                            <td>{{ $listrequest->kvkkForm }}</td>
                                            <td>{{ $listrequest->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.showrequest', $carRequest->id) }}" class="btn btn-primary btn-sm">Detay</a>
                                            </td>   
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="15" class="text-center">Henüz talep bulunmamaktadır.</td>
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
