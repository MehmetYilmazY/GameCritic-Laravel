@extends('layouts.master')

@section('content')
<div class="container w-50 my-5">
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
                <div class="form-check">
                    <input class="form-check-input" id="teslimEdilecek" type="checkbox" name="teslimEdilecek" />
                    <label class="form-check-label" for="teslimEdilecek">Aracı aldığım yere teslim edeceğim</label>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="kullaniciName">Kullanıcı Seçiniz</label>
                <select class="form-select" id="kullaniciName" name="kullaniciName" aria-label="Kullanıcı Seçiniz">
                    <option value="" selected disabled>Seçiniz</option>
                    @foreach($users as $user)
                        <option value="{{ $user->name }}" data-email="{{ $user->email }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 row">
                <div class="col-md-4">
                    <label class="form-label" for="alisYeri">Alış Yeri</label>
                    <input class="form-control" id="alisYeri" name="alisYeri" type="text" placeholder="Alış Yeri" required />
                    <div class="invalid-feedback">Alış Yeri is required.</div>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="alisTarihi">Alış Tarihi</label>
                    <input class="form-control" id="alisTarihi" name="alisTarihi" type="date" placeholder="Alış Tarihi" required />
                    <div class="invalid-feedback">Alış Tarihi is required.</div>
                </div>

                <div class="col-md-4">
                    <label class="form-label" for="alisSaati">Gidiş</label>
                    <input class="form-control" id="alisSaati" name="alisSaati" type="time" placeholder="Gidiş" required />
                    <div class="invalid-feedback">Gidiş is required.</div>
                </div>
            </div>

            <div class="mb-3 row">
            <div class="col-md-4">
                <label class="form-label" for="teslimYeri">Teslim Yeri</label>
                <input class="form-control" id="teslimYeri" name="teslimYeri" type="text" placeholder="Teslim Yeri" required />
                <div class="invalid-feedback">Bırakış Yeri is required.</div>
            </div>

            <div class="col-md-4">
                <label class="form-label" for="teslimTarihi">Teslim Tarihi</label>
                <input class="form-control" id="teslimTarihi" name="teslimTarihi" type="date" placeholder="Teslim Tarihi" required />
                <div class="invalid-feedback">Teslim Tarihi is required.</div>
            </div>

            <div class="col-md-4">
                <label class="form-label" for="teslimSaati">Dönüş</label>
                <input class="form-control" id="teslimSaati" name="teslimSaati" type="time" placeholder="Dönüş" required />
                <div class="invalid-feedback">Dönüş is required.</div>
            </div>
        </div>


            <div class="mb-3">
                <label class="form-label" for="firma">Firma</label>
                <select class="form-select" id="firma" name="firma" aria-label="Firma">
                    <option value="" selected disabled>Seçiniz</option>
                    <option value="Avis">Avis</option>
                    <option value="Garenta">Garenta</option>
                    <option value="Sixt">Sixt</option>
                    <option value="Budget">Budget</option>
                    <option value="Enterprise">Enterprise</option>
                    <option value="RentGo">Rent Go</option>
                    <option value="diger">Diğer</option>
                </select>
            </div>

            <div class="mb-3 d-flex">
                <div class="me-3 w-50">
                    <label class="form-label" for="mailGonderilecekKisi">Mail Gönderilecek Kişi*</label>
                    <input class="form-control disabled" id="mailGonderilecekKisi" name="mailGonderilecekKisi1" type="text" placeholder="Mail Gönderilecek Kişi" required readonly/>
                    <div class="invalid-feedback">Mail Gönderilecek Kişi is required.</div>
                </div>

                <div class="me-3 w-50">
                    <label class="form-label" for="mailGonderilecekKisi2">Mail Gönderilecek İkinci Kişi</label>
                    <input class="form-control" id="mailGonderilecekKisi2" name="mailGonderilecekKisi2" type="text" placeholder="Mail Gönderilecek İkinci Kişi" />
                    <div class="invalid-feedback">Mail Gönderilecek Kişi is required.</div>
                </div>
            </div>


            <div class="mb-3">
                <label class="form-label" for="aciklama">Açıklama</label>
                <textarea class="form-control" id="aciklama" name="aciklama" type="text" placeholder="Açıklama" style="height: 10rem;" required></textarea>
                <div class="invalid-feedback">Açıklama is required.</div>
            </div>

            <div class="mb-3">
                <label class="form-label d-block"></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="kvkkForm" name="kvkkForm" type="checkbox" required />
                    <label class="form-check-label" for="kvkkForm">Araç Kiralama ile ilgili kuralları okudum ve onaylıyorum.</label>
                </div>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Kaydet ve Gönder</button>
            </div>
        </form>

        <div class="rules p-3 mt-3 bg-light text-dark">
    <p class="fw-bold" style="font-size: 17px;">Araç Kiralama Kuralları</p>
    <ul>
        <li>Tercih ettiğiniz aracı sorunsuz kiralayabilmeniz adına lütfen ehliyet yılınızı ve yaşınızı kontrol ediniz. Sistem üzerinde sizlerden istenen bilgileri eksiksiz olarak doldurduğunuzdan emin olunuz. Ehliyet yılı ve kiralama için istenilen yaş şartlarının yerine getirilememesinden kaynaklanacak teslimat probleminden acenteniz sorumlu değildir.</li>
        <li>Araç seçiminizi yaptıktan sonra kiralama firmasının politikalarına göre aynı gruptan farklı bir araç ile hizmet sağlanabilir ve ya ilgili grupta operasyonel sebeplerden kaynaklı müsaitlik bulunmaması durumunda bir üst sınıftan fiyat farksız olarak yardımcı olunacaktır.</li>
        <li>Seçmiş olduğunuz araç tarafınız için Full Credit (Acente Ödemeli) olarak rezerve edilecektir. İlgili paketimiz kapsamında kiralama ofisinde tarafınızdan herhangi bir kredi kartı provizyonu ve finansal rapor kontrolü yapılmayacaktır.</li>
        <li>Teslim aldığınız aracın eksik yakıt ile iade edilmesi durumunda aracın yakıt farkı, tutarın üzerine servis bedelleri eklenerek firmanıza fatura edilecektir.</li>
        <li>Trafik cezaları kiralama firması tarafında acentenize fatura edilecek olup, ilgili cezai tutarlar firmanıza fatura edilecektir.</li>
        <li>Araç kiralamanız sürecinde sözleşmede ismi bulunmayan bir ek sürücünün aracı kullanması sırasında oluşacak tüm masraflar kiralayanın sorumluluğundadır.</li>
        <li>Olası hasar durumlarında maddi yükümlülük oluşturmaması için kiralama ofisinde aracınıza hasar paketi eklemesi yapabilirsiniz, hasar paketleri acentenize fatura edilecek olup servis bedeli uygulanarak tarafınıza fatura edilecektir. Hasar paketsiz oluşacak hasarlarda kiralama firması ilgili hasar tutarını acenteniz aracılığı ile firmanıza fatura edilecektir. Polis raporlu hasarlarda ise kiralama firmasının kriterleri geçerli olacaktır, acenteniz sorumluluk kabul etmeyecektir.</li>
        <li>Aracınızı teslim almanız durumunda mümkün ise video kaydı ile aracın hasarlı bölgelerini tespit etmeniz sizler için faydalı olacaktır ve bu hasarları kiralama tutanağına işletmenizi rica ederiz.</li>
        <li>Araç teslim alım ve iade ediş saatlerinde oluşacak farklılıklardan kaynaklanacak fiyat farkları firmanıza fatura edilecektir.</li>
        <li>Stepne, kriko, yangın söndürücü ve ilk yardım çantasının araçta olup olmadığı kontrol edilip eğer yok ise tutanağa not olarak eklenmesini rica ederiz.</li>
    </ul>
</div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
       // Sayfa yüklendiğinde çalışacak kod
       $(document).ready(function() {
        // Kullanıcı seçimi değiştiğinde çalışacak kod
        $('#kullaniciName').change(function() {
            // Seçilen kullanıcının emailini al
            var selectedUserEmail = $(this).find(':selected').data('email');
            // Mail gönderilecek kişi alanına emaili yaz
            $('#mailGonderilecekKisi').val(selectedUserEmail);
        });
    });

    document.getElementById('teslimEdilecek').addEventListener('change', function () {
        var elementsToDisable = document.querySelectorAll('#teslimYeri');
        elementsToDisable.forEach(function (element) {
            element.disabled = this.checked;
        }, this);
    });
</script>
@endsection
