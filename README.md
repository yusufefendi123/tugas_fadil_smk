# Website NU Desa Paningkaban

Website untuk mengelola informasi, berita, kegiatan NU, dan data kehadiran jamaah Desa Paningkaban menggunakan Laravel dan MySQL.

## 1.1. Clone Repository Laragon

Buka terminal, lalu masuk ke folder penyimpanan proyek:

```bash
cd C:\laragon\www
```

Clone repository dari GitHub:

```bash
git clone https://github.com/USERNAME/website-nu-paningkaban.git
```

Ganti `USERNAME` dan nama repository sesuai repository GitHub yang digunakan.

Masuk ke folder proyek:

```bash
cd website-nu-paningkaban
```

## 1.2. Clone Repository Xampp

Buka terminal, lalu masuk ke folder penyimpanan proyek:

```bash
cd C:\laragon\www
```

Clone repository dari GitHub:

```bash
git clone https://github.com/USERNAME/website-nu-paningkaban.git
```

Ganti `USERNAME` dan nama repository sesuai repository GitHub yang digunakan.

Masuk ke folder proyek:

```bash
cd website-nu-paningkaban
```

## 2. Konfigurasi File `.env`

Salin file `.env.example` menjadi `.env`.

Untuk Windows:

```bash
copy .env.example .env
```

Buka file `.env`, kemudian sesuaikan konfigurasi database:

```dotenv
APP_NAME="Website NU Desa Paningkaban"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nu_paningkaban
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null
```

Sesuaikan nama database, username, dan password dengan konfigurasi MySQL di komputer masing-masing.

## 3. Buat Database

Jalankan MySQL melalui Laragon, kemudian buka phpMyAdmin.

Buat database dengan nama:

```sql
CREATE DATABASE nu_paningkaban;
```

Pastikan nama database sama dengan nilai `DB_DATABASE` di file `.env`.


## 4. Generate Application Key

Jalankan perintah berikut untuk membuat application key Laravel:

```bash
php artisan key:generate
```

## 5. Migrasi Database

Buat tabel-tabel yang dibutuhkan aplikasi:

```bash
php artisan migrate
```

Pastikan proses migrasi berhasil sebelum melanjutkan ke seeder.

## 6. Menyesuaikan dan Menjalankan Seeder

Periksa file seeder di direktori `database/seeders/`. Sesuaikan data yang dimasukkan dengan struktur tabel pada migration.

Pastikan data yang diperlukan, seperti akun administrator atau data awal lainnya, dibuat melalui seeder yang sesuai.

Jalankan seeder utama:

```bash
php artisan db:seed
```

Jika hanya ingin menjalankan seeder tertentu:

```bash
php artisan db:seed --class=NamaSeeder
```

Ganti `NamaSeeder` dengan nama kelas seeder yang tersedia di proyek.

**Catatan:** Jangan menjalankan `php artisan migrate:fresh --seed` pada database yang berisi data penting karena perintah tersebut menghapus tabel dan data yang ada sebelum membuatnya kembali.

## 7. Bersihkan Cache

Jalankan perintah berikut untuk membersihkan cache optimasi Laravel:

```bash
php artisan optimize:clear
```

## 8. Jalankan Website

Jalankan server Laravel:

```bash
php artisan serve
```

Buka website melalui browser:

http://127.0.0.1:8000

## 9 Login Administrator

Buka halaman login administrator sesuai route yang tersedia di aplikasi.

Jika akun administrator dibuat melalui seeder, gunakan kredensial yang telah ditentukan dalam seeder tersebut. Jika belum tersedia, buat akun administrator melalui mekanisme yang sesuai dengan aplikasi.

## Catatan

- Pastikan MySQL berjalan sebelum menjalankan migrasi.
- Jangan mengunggah file `.env` ke GitHub karena dapat berisi informasi sensitif.
- Jangan menjalankan seeder sebelum memastikan data yang dimasukkan sesuai dengan tabel.
- Jika terjadi perubahan konfigurasi, jalankan `php artisan optimize:clear`.
- Jika proyek membutuhkan proses build frontend, jalankan perintah build yang sesuai dengan konfigurasi proyek.
