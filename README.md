# TP9DPBO2025C2 - Sistem Data Mahasiswa (PHP MVP Sederhana)
Tugas Praktikum 9 DPBO C2

Aplikasi ini merupakan implementasi sistem manajemen data mahasiswa berbasis PHP yang menggunakan arsitektur **MVP (Model-View-Presenter)**. Fitur utama meliputi **CRUD** (Create, Read, Update, Delete) data mahasiswa.

## Janji
Saya Julian Dwi Satrio dengan NIM 2300484 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain Pemrograman Berorientasi Objek. Untuk Keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah di spesifikasikan. Aamiin.

## Desain Program

Struktur direktori:

```
├── index.php # Entry point utama
├── mvp_php.sql # SQL schema database
├── model/
│ ├── DB.class.php # Template menjalankan query
│ ├── Mahasiswa.class.php # Model data mahasiswa
│ ├── TabelMahasiswa.class.php # Query data ke tabel mahasiswa
│ └── Template.class.php # Engine untuk mengganti template
├── presenter/
│ ├── KontrakPresenter.php # Interface kontrak untuk presenter
│ └── ProsesMahasiswa.php # Presenter (penghubung model & view)
├── templates/
│ ├── form.html # Template form tambah/edit mahasiswa
│ └── indextable.html # Template tampilan data mahasiswa
├── view/
│ ├── KontrakView.php # Interface kontrak untuk view
│ └── TampilMahasiswa.php # View utama (frontend logic)

```

## Arsitektur: MVP (Model - View - Presenter)

- **Model** (`model/`): Mengatur akses dan manipulasi data (DB dan tabel).
- **View** (`view/`): Menyediakan antarmuka kepada user dan memanggil presenter.
- **Presenter** (`presenter/`): Menangani logika dan komunikasi antara view dan model.

---

## Fitur 

- 🔍 Melihat daftar mahasiswa
- ➕ Menambahkan mahasiswa baru
- ✏️ Mengedit data mahasiswa
- 🗑️ Menghapus mahasiswa
- ✅ Menampilkan alert berhasil saat tambah/edit

## Alur Program 
- index.php menentukan logika berdasarkan parameter GET/POST.
- Fungsi directAdd() atau directEdit($id) menampilkan form melalui template.
- Fungsi addToDB() dan editAtDB() mengirimkan data ke presenter.
- Presenter (ProsesMahasiswa.php) memproses dan memanggil model (TabelMahasiswa.class.php).
- Model mengeksekusi query ke database mahasiswa.
- Setelah selesai, View me-render ulang halaman dengan alert jika diperlukan.

## Dokumentasi Program

https://github.com/user-attachments/assets/0ed047b5-f62c-4523-a019-f5aaa60e83f8

