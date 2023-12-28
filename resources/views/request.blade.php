@extends('layouts.master')

@section('content')
<div class="container w-25 my-5">
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form id="contactForm" action="{{ route('arac-talep-formu') }}" method="post" class="needs-validation">
                @csrf
                <div class="mb-3">
                    <label for="adSoyad" class="form-label">Ad Soyad</label>
                    <input type="text" class="form-control" id="adSoyad" name="adSoyad" required>
                    <div class="invalid-feedback">Ad Soyad girilmesi zorunludur.</div>
                </div>
                <div class="mb-3">
                    <label for="ePosta" class="form-label">E-posta</label>
                    <input type="email" class="form-control" id="ePosta" name="ePosta" required>
                    <div class="invalid-feedback">E-posta girilmesi zorunludur.</div>
                    <div class="invalid-feedback">E-posta adresi geçerli değildir.</div>
                </div>
                <div class="mb-3">
                    <label for="telNo" class="form-label">Telefon Numarası</label>
                    <input type="text" class="form-control" id="telNo" name="telNo" required>
                    <div class="invalid-feedback">Telefon Numarası girilmesi zorunludur.</div>
                </div>
                <div class="mb-3">
                    <label for="alisTarihi" class="form-label">Araç Alış Tarihi</label>
                    <input type="date" class="form-control" id="alisTarihi" name="alisTarihi" required>
                    <div class="invalid-feedback">Araç alış tarihi girilmesi zorunludur.</div>
                </div>

                <div class="mb-3">
                    <label for="teslimTarihi" class="form-label">Araç Teslim Tarihi</label>
                    <input type="date" class="form-control" id="teslimTarihi" name="teslimTarihi" required>
                    <div class="invalid-feedback">Araç teslim tarihi girilmesi zorunludur.</div>
                </div>
                <div class="mb-3">
                    <label for="carType" class="form-label">Tercih Edilen Araç Segmenti</label>
                    <select class="form-select" id="carType" name="carType" aria-label="carType">
                        <option value="Tumu">Tümü</option>
                        <option value="A-B-C">A - B - C Segmentleri</option>
                        <option value="D-E-F">D - E - F Segmentleri</option>
                        <option value="G-J-M-S">G - J - M - S Segmentleri</option>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="kvkkForm" name="kvkkForm" required>
                        <label class="form-check-label" for="kvkkForm">Bu iletişim formunu göndererek Kullanım Şartları ve Gizlilik Bildirimini kabul ediyorum.</label>
                        <div class="invalid-feedback">Kullanım Şartları kabul edilmelidir.</div>
                    </div>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Gönder</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection