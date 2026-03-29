**Nama**: Nayla camelia indraswari

**NIM**: 2409116009

**Kelas**: A

# MiniProject2-Pemrograman-Berbasis-Web-Portofolio

Project ini merupakan website portofolio yang dibuat menggunakan HTML, CSS, Bootstrap 5, Vue JS, dan PHP dengan koneksi database MySQL. Website ini menampilkan informasi pribadi, pengalaman, skill, sertifikat, dan media sosial secara interaktif dan responsif.

---

## 💻 Tampilan Website
<img width="1916" height="991" alt="Screenshot 2026-03-27 135638" src="https://github.com/user-attachments/assets/e8e28042-52a9-49fa-9138-1d95c8555235" />

<img width="1918" height="994" alt="Screenshot 2026-03-27 135643" src="https://github.com/user-attachments/assets/0e606daf-5085-4a16-9588-343bb0c73577" />

<img width="1919" height="981" alt="Screenshot 2026-03-27 135649" src="https://github.com/user-attachments/assets/f0622e7a-0c83-4cff-890b-27e5f07d4a3d" />

<img width="1919" height="986" alt="Screenshot 2026-03-27 135653" src="https://github.com/user-attachments/assets/2855de81-a17f-4316-9b76-3d85f79cab53" />

---

## 🔍 Teknologi yang Digunakan

| Teknologi | Kegunaan |
|---|---|
| **HTML** | Membangun struktur utama website seperti navbar, hero, about, certificates, contact, dan footer |
| **CSS** | Mengatur tampilan visual seperti warna, layout tambahan, animasi hover, dan efek transisi |
| **Bootstrap 5** | Layout responsif menggunakan grid system, serta komponen siap pakai seperti navbar, card, progress bar, dan utility class |
| **Bootstrap Icons** | Menampilkan ikon pada navbar, tools, social media, dan badge profil |
| **Vue JS** | Menampilkan data secara dinamis seperti nama, skill, sertifikat, dan social media tanpa menulis ulang HTML secara manual |
| **Google Fonts (Poppins)** | Font utama untuk tampilan bersih dan konsisten di seluruh halaman |
| **PHP** | Sebagai backend API yang mengambil data dari database dan mengembalikannya dalam format JSON |
| **MySQL** | Menyimpan semua data portofolio seperti profil, skill, pengalaman, sertifikat, dan social media |

---

## 🗂️ Struktur File

```
portofolio/
├── index.php       # Halaman utama (HTML + Vue JS)
├── api.php         # Backend API — mengambil data dari database
├── db.php          # Konfigurasi koneksi database
├── style.css       # Custom styling
└── assets/
    ├── profile-pict.png
    └── sertif-1.png
    └── sertif-2.png
    └── sertif-3.png
```

---

## 🗃️ Database

### Struktur Tabel

**Tabel `profile`** — menyimpan informasi pribadi

| Kolom | Tipe | Keterangan |
|---|---|---|
| id | INT | Primary key |
| name | VARCHAR | Nama lengkap |
| tagline | VARCHAR | Tagline singkat |
| description | TEXT | Deskripsi hero section |
| description_extra | TEXT | Deskripsi about section |
| email | VARCHAR | Alamat email |
| location | VARCHAR | Alamat tempat tinggal |
| campus | VARCHAR | Nama kampus |
| cert_sub | TEXT | Subjudul section certificates |
| contact_sub | TEXT | Subjudul section contact |

**Tabel `skills`** — menyimpan daftar skill teknis

| Kolom | Tipe | Keterangan |
|---|---|---|
| id | INT | Primary key |
| name | VARCHAR | Nama skill |
| level | INT | Persentase kemampuan (0–100) |
| sort_order | INT | Urutan tampil |

**Tabel `experiences`** — menyimpan pengalaman pribadi

| Kolom | Tipe | Keterangan |
|---|---|---|
| id | INT | Primary key |
| year | VARCHAR | Tahun (contoh: 2023–2024) |
| role | VARCHAR | posisi/peran dalam organisasi |
| place | VARCHAR | Nama organisasi/institusi |
| sort_order | INT | Urutan tampil |

**Tabel `certificates`** — menyimpan data sertifikat

| Kolom | Tipe | Keterangan |
|---|---|---|
| id | INT | Primary key |
| title | VARCHAR | Judul sertifikat |
| issuer | VARCHAR | Instansi penerbit |
| year | YEAR | Tahun terbit |
| description | TEXT | Deskripsi singkat |
| image | VARCHAR | Path gambar (contoh: `assets/certificates/cert1.jpg`) |
| tags | VARCHAR | Tag skill, dipisah koma (contoh: `HTML,CSS,Bootstrap`) |
| sort_order | INT | Urutan tampil |

**Tabel `socials`** — menyimpan data social media

| Kolom | Tipe | Keterangan |
|---|---|---|
| id | INT | Primary key |
| label | VARCHAR | Nama platform (contoh: GitHub) |
| link | VARCHAR | URL lengkap |
| icon | VARCHAR | Class Bootstrap Icon (contoh: `bi-github`) |
| sort_order | INT | Urutan tampil |

---

### Cara Kerja Koneksi Database

Project ini menggunakan pola **PHP sebagai API dan Vue JS sebagai tampilan**. Alurnya:

```
Browser (Vue JS)
      │
      │  fetch('api.php?section=skills') - kirim request ke php
      ▼
   api.php  ──────────────────────────────┐
      │  switch($section)                 │
      │  case 'skills': query DB          │
      ▼                                   │
   db.php (getConnection())               │
      │                                   │
      ▼                                   │
   MySQL                                  │
      │  hasil query                      │
      ▼                                   │
   json_encode($data)  ◄──────────────────┘
      │
      ▼
Browser menerima data JSON dari php → Vue JS render ke HTML
```

Semua request data dilakukan melalui satu file `api.php` dengan parameter `?section=` untuk menentukan data apa yang diambil:

| URL | Data yang dikembalikan |
|---|---|
| `api.php?section=profile` | Data profil (nama, tagline, deskripsi, dll) |
| `api.php?section=experiences` | Daftar pengalaman |
| `api.php?section=skills` | Daftar skill beserta level |
| `api.php?section=certificates` | Daftar sertifikat |
| `api.php?section=socials` | Daftar social media |

---

## 📄 Penjelasan Kode
 

<details>
   <summary>Navbar Section</summary>
  
Navbar terdiri dari tiga button yang terhubung dengan setiap section pada website, yakni button Home, About me, Certificate dan Contact. 

### HTML

Section ini menerapkan komponen Navbar Bootstrap yang dilengkapi dengan:
1. **Utility spacing** (`ms-auto`) untuk mengatur posisi dan jarak antar elemen agar lebih rapi.
2. **Collapse system** (`navbar-toggler`, `collapse`, `data-bs-toggle`) untuk menyembunyikan menu dalam bentuk hamburger saat layar berukuran kecil.
3. **Breakpoint** `navbar-expand-lg` untuk memastikan navbar berubah secara otomatis berdasarkan ukuran layar, sehingga tetap responsif di berbagai device.`

### CSS


CSS mengatur warna, ukuran font, padding, efek blur, serta efek hover pada button.

</details>

---

<details>
   <summary>Hero Section</summary>

Hero Section terdiri dari deskripsi singkat diri, greetings, foto porfil dan button koneksi.

### HTML

Section ini menerapkan komponen Bootstrap dan Interpolasi Vue Js sebagai berikut:
1. **Grid system & breakpoint** `col-12 col-lg-7` untuk membagi layout menjadi beberapa kolom dengan sistem 12 grid dan memastikan agar tampilan website tetap responsive di berbagai layar.
2. **Spacing utilities** `mt-4` untuk memberi spacing margin top.
3. **Flex utilities**`d-flex` untuk mengaktifkan display flexbox pada button sehingga dapat disusun secara horizontal.
4. **Interpolasi Vue Js**, `{{ tagline }}`, `{{ description }}`, untuk menampilkan data yang  disimpan pada vue.
5. **Text alignment** `text-center text-lg-end` untuk mengatur tata letak teks secara responsif.

### CSS

CSS mengatur warna, ukuran font, padding, efek blur, serta efek hover pada button.

</details>

---

<details>
<summary>About Me Section</summary>

About Me terbagi menjadi dua bagian, section kiri berisi pengalaman, section kanan berisi deskripsi skill, progress bar skill, dan daftar tools yang dikuasai. Section ini telah menerapkan bootstrap dan interpolasi Vue Js.

### HTML

Section ini menerapkan komponen Bootstrap dan Vue JS sebagai berikut:
1. **Grid system** `col-12 col-lg-5`  dan `col-12 col-lg-7`  uigunakan untuk membagi tampilan menjadi dua bagian dan ketika di layar kecil otomatis menjadi satu kolom sehingga web bersifat responsift.
2. **Progress bar** menggunakan `<div class="progress-bar">` untuk memanggil komponen progress bar bawaan Bootstrap.
3. **Flex utility** `d-flex flex-wrap gap-2` untuk menampilkan tools dalam satu baris dengan gap yang sama.
4. **Interpolasi Vue JS `v-for`**  `v-for="skill in skills"` dan `:style="{ width: skill.level + '%' }"` untuk menampilkan daftar skill dari data yang sudah disimpan, jadi tidak perlu menulis satu per satu secara manual.

### CSS

CSS mengatur background, warna & kuran font, padding, efek blur pada experience section serta warna progress bar.

</details>

---

<details>
<summary>Certificates Section</summary>

Section Certificates menampilkan daftar sertifikat dalam layout grid kartu. Setiap kartu memiliki gambar sertifikat, instansi penerbit, judul, deskripsi, dan tag skill yang dipelajari.

### HTML

Section ini menerapkan komponen Bootstrap dan Vue JS sebagai berikut:
1. **Grid system** `col-12 col-md-6 col-lg-4` untuk menampilkan card yang secara otomatis menyesuaikan ukurannya dengan layar device.
2. **Card component** `card`, `card-img-top`, `card-body`, `card-title`, `card-text` merupakan komponen bootsrtrap yang akan mengisi tampilan sertifikat.
3. **Interpolasi Vue JS `v-for` nested** — `v-for="cert in certificates"` untuk menampilkan sertifikat dari data yang telah tersimpan di vue.

### CSS

CSS mengatur tampilan kartu mulai dari font pada deksirpsi informasi sertifikat, ukuran gambar yang ditampilkan hingga efek blur ketika dilakukan hover pada kartu.

</details>

---

<details>
<summary>Contact Section</summary>

Section Contact terbagi menjadi dua kolom utama, section kiri berisi informasi sosial media yang dapat dihubungi, sedangkan section kanan berisi data diri singkat.

### HTML

Section ini menerapkan komponen Bootstrap dan Vue JS sebagai berikut:
1. **Grid system** `col-12 col-lg-6` untuk membagi tampilan menjadi dua kolom dengan ukuran yang sama.
2. **Flex utility** `d-flex flex-wrap gap-3` untuk menyusun tombol sosial media secara horizontal dan otomatis ke baris baru jika tidak muat.
3. **Spacing utility** `mt-4` untuk memberi jarak antara elemen sehingga tidak perlu menambah CSS manual.
4. **Vue JS `:class` binding** `:class="soc.icon"` dan `:class="info.icon"` untuk menampilkan daftar social media, link, serta bootstrap icon yang sudah tersimpan di vue.

### CSS

CSS mengatur warna section, ukuran dan warna font, serta  menambahkan efek visual seperti animasi titik yang berkedip (pada availability) dan perubahan warna tombol saat dihover.

</details>

---

<details>
<summary>Footer</summary>

Footer menampilkan teks copyright di kiri dan tautan *Back to top* di kanan yang, ketika diklik, akan membawa pengguna ke halaman awal website.

### HTML


Footer menggunakan Bootstrap utility classes sepenuhnya untuk layout:
1. **Flex utility** `d-flex justify-content-between` untuk menempatkan copyright di kiri dan link di kanan secara otomatis dalam satu baris.
2. **Spacing utility** `py-2` untuk padding vertikal tipis dan `mb-0` untuk menghilangkan margin bawah default

### CSS


CSS mengatur ukuran dan warna font, menambah garis tipis diatas footer untuk memberikan batasan dengan section sebelumnya serta mengatur perubahan elemen ketika melakukan hover pada *Back to top*.

</details>

---
## 🐘 Penjelasan Kode PHP

<details>
<summary>db.php — Koneksi Database</summary>

File ini bertanggung jawab atas koneksi ke database MySQL dan digunakan oleh `api.php` melalui `require_once`.

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '1');
define('DB_NAME', 'portfolio_db');

function getConnection(): mysqli {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        http_response_code(500);
        echo json_encode(['error' => 'Koneksi database gagal: ' . $conn->connect_error]);
        exit;
    }

    $conn->set_charset('utf8mb4');
    return $conn;
}
```

**Penjelasan secara detail:**

`define()` — mendefinisikan konstanta konfigurasi database. Konstanta tidak bisa diubah nilainya setelah didefinisikan dan tidak memerlukan tanda `$`.

`function getConnection(): mysqli` — function yang mengembalikan objek koneksi MySQL.

`new mysqli(...)` — membuat koneksi baru ke database. Hasilnya disimpan di variabel `$conn`.

`$conn->connect_error` — mengecek apakah koneksi berhasil. Jika gagal, PHP mengirim HTTP status 500 dan response JSON berisi pesan error, lalu menghentikan eksekusi dengan `exit`.

`$conn->set_charset('utf8mb4')` — mengatur encoding karakter agar teks berbahasa Indonesia dan karakter khusus tidak rusak saat dibaca dari database.

</details>

---

<details>
<summary>api.php — Backend API</summary>

File ini adalah satu-satunya endpoint yang melayani semua permintaan data dari Vue JS. Permintaan dibedakan menggunakan parameter `?section=` di URL.

```php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once 'db.php';

$section = $_GET['section'] ?? '';
$conn = getConnection();

switch ($section) {
    case 'profile': ...
    case 'experiences': ...
    case 'skills': ...
    case 'certificates': ...
    case 'socials': ...
    default: ...
}

$conn->close();
```

**Penjelasan bagian utama:**

`header('Content-Type: application/json')` — memberitahu browser bahwa response yang dikirim adalah JSON, bukan HTML. Harus diletakkan sebelum ada output apapun.

`$_GET['section'] ?? ''` — mengambil nilai parameter `section` dari URL. Operator `??` adalah *null coalescing* — jika parameter tidak ada maka nilainya string kosong, sehingga tidak terjadi error.

`switch ($section)` — memilih blok kode yang dijalankan berdasarkan nilai `$section`. Lebih rapi dibanding banyak `if-else` ketika pilihan lebih dari dua.

`$conn->close()` — menutup koneksi database setelah semua data selesai diambil untuk membebaskan resource server.

---

**Cara kerja tiap `case`:**

**`case 'profile'`** — mengambil satu baris data profil dengan `LIMIT 1`, lalu langsung di-encode ke JSON tanpa loop karena hanya satu baris.

```php
case 'profile':
    $result = $conn->query("SELECT * FROM profile LIMIT 1");
    echo json_encode($result->fetch_assoc());
    break;
```

`fetch_assoc()` — mengambil satu baris hasil query sebagai array asosiatif (`["name" => "Nayla", ...]`), yang kemudian diubah menjadi JSON object oleh `json_encode()`.

---

**`case 'experiences'` dan `case 'socials'`** — mengambil banyak baris, ditampung dalam array menggunakan loop `while`.

```php
case 'experiences':
    $result = $conn->query("SELECT year, role, place FROM experiences ORDER BY sort_order ASC");
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
    break;
```

`$data[] = $row` — menambahkan setiap baris ke array `$data`. Tanda `[]` tanpa index berarti *push* ke akhir array.

`ORDER BY sort_order ASC` — mengurutkan data berdasarkan kolom `sort_order` dari kecil ke besar sehingga urutan tampil bisa dikontrol dari database.

---

**`case 'skills'`** — sama seperti experiences, dengan tambahan konversi tipe data.

```php
case 'skills':
    $result = $conn->query("SELECT name, level FROM skills ORDER BY sort_order ASC");
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $row['level'] = (int)$row['level'];
        $data[] = $row;
    }
    echo json_encode($data);
    break;
```

`(int)$row['level']` — *type casting* yang mengubah nilai `level` dari string menjadi integer. Data dari MySQL selalu dikembalikan sebagai string oleh PHP, sehingga perlu dikonversi agar Vue JS menerima data dengan tipe integer.

---

**`case 'certificates'`** — mengambil sertifikat dan memecah kolom `tags` dari string menjadi array.

```php
case 'certificates':
    $result = $conn->query("SELECT title, issuer, year, description AS `desc`, image, tags
                            FROM certificates ORDER BY sort_order ASC");
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $row['tags'] = explode(',', $row['tags']);
        $data[] = $row;
    }
    echo json_encode($data);
    break;
```

`description AS desc` — *alias* kolom, mengubah nama kolom `description` menjadi `desc` pada hasil query agar sesuai dengan nama properti yang digunakan di Vue JS (`cert.desc`).

`explode(',', $row['tags'])` — memecah string `"HTML,CSS,Bootstrap"` menjadi array `["HTML", "CSS", "Bootstrap"]`. Ini diperlukan karena Vue JS menggunakan `v-for="tag in cert.tags"` yang membutuhkan array, bukan string.

---

**`default`** — menangani permintaan dengan nilai `section` yang tidak dikenal.

```php
default:
    http_response_code(400);
    echo json_encode(['error' => 'Section tidak valid']);
```

`http_response_code(400)` — mengirim HTTP status 400 (Bad Request) untuk memberitahu browser bahwa permintaan tidak valid. Tanpa ini, response tetap 200 (OK) meskipun datanya error.

</details>

---

<details>
<summary>Cara Vue JS dan PHP Bekerja Bersama</summary>

Vue JS memanggil `api.php` menggunakan `fetch()` dari dalam `index.php`. Semua request dikirim secara bersamaan menggunakan `Promise.all()`.

```javascript
async loadAllData() {
  try {
    const [profile, experiences, skills, certificates, socials] = await Promise.all([
      fetch('api.php?section=profile').then(r => r.json()),
      fetch('api.php?section=experiences').then(r => r.json()),
      fetch('api.php?section=skills').then(r => r.json()),
      fetch('api.php?section=certificates').then(r => r.json()),
      fetch('api.php?section=socials').then(r => r.json()),
    ]);

    this.profile      = profile;
    this.experiences  = experiences;
    this.skills       = skills;
    this.certificates = certificates;
    this.socials      = socials;

  } catch (error) {
    console.error('Gagal memuat data dari database:', error);
  }
}
```

**Penjelasan alur:**

`fetch('api.php?section=profile')` — mengirim HTTP GET request ke `api.php` dengan parameter `section=profile`. PHP membaca parameter ini melalui `$_GET['section']` dan menjalankan `case 'profile'`.

`.then(r => r.json())` — mengubah response HTTP menjadi JavaScript object/array. Ini adalah versi ringkas dari `await fetch(...); await res.json()` yang digabung dalam satu baris.

`Promise.all([...])` — menjalankan semua lima `fetch()` secara bersamaan (paralel), tidak menunggu satu selesai sebelum mulai yang lain. Hasilnya dikumpulkan dalam satu array setelah semuanya selesai.

`this.profile = profile` — menyimpan data yang diterima dari PHP ke dalam `data()` Vue. Setiap kali nilai ini berubah, Vue otomatis memperbarui tampilan di browser tanpa perlu refresh halaman.

</details>
