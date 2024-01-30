# Oyun İnceleme Uygulaması

Bu proje, Laravel kullanılarak geliştirilmiş bir oyun inceleme uygulamasıdır. Kullanıcılar, sistemde bulunan oyunları puanlayabilir ve videolarını görebilirler.

## Özellikler

- CRUD (Create, Read, Update, Delete) işlemleri
- Anasayfada oyun listesi: Eklenen oyunlar anasayfada ve tüm oyunlar sayfasında listelenir.
- Kullanıcı yetkilendirmesi: Yalnızca yetkili kullanıcılar oyun ekleyebilir, güncelleyebilir ve silebilir.

## Kurulum

**Laravel Kurulumu:**
   composer install
   cp .env.example .env
   php artisan key:generate
   
## Veritabanı Ayarları:
.env dosyasını açın ve veritabanı bağlantı bilgilerinizi güncelleyin.

Gerekli Paketlerin Yüklenmesi:

composer require laravel/ui
php artisan ui bootstrap --auth

**Migrasyonlar ve Seederlar:**
php artisan migrate --seed

Katkıda Bulunma
Bu depoyu fork edin.
Yeni bir branch oluşturun (git checkout -b yeni-ozellik)
Değişikliklerinizi commit edin (git commit -am 'Yeni özellik: <ad>')
Branch'inizi push edin (git push origin yeni-ozellik)
Bir pull request açın.
