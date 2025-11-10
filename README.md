

## 📘 Buat file `README.md`

Isi dengan teks berikut 👇

```markdown
# 🧩 PHP REST API - CRUD User

Proyek ini adalah implementasi sederhana RESTful API menggunakan **PHP + MySQL**.  
API ini mendukung operasi **Create**, **Read**, **Update**, dan **Delete** (CRUD) untuk tabel `users`.

---

## 📂 Struktur Folder
```

api_user/
│
├── config/
│   └── database.php         # Koneksi ke database MySQL
│
├── users/
│   ├── create.php           # Endpoint untuk menambah user (POST)
│   ├── read.php             # Endpoint untuk menampilkan semua user (GET)
│   ├── update.php           # Endpoint untuk memperbarui user (PUT)
│   └── delete.php           # Endpoint untuk menghapus user (DELETE)
│
└── index.php                # (Opsional) File utama

```

---

## 🗄️ Struktur Database

### Nama Database
```

api_user_db

````

### Tabel: `users`
```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);
````

### Contoh Data Awal

```sql
INSERT INTO users (username, email, password)
VALUES
('Marsel', 'marsel@gmail.com', '12345'),
('Zizi', 'zizi@gmail.com', 'zizi123');
```

---

## ⚙️ Konfigurasi Database

Edit file `config/database.php`:

```php
<?php
$host = "localhost";
$db_name = "api_user_db";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
```

---

## 🧠 Endpoint API

| Method     | Endpoint            | Deskripsi                     |
| ---------- | ------------------- | ----------------------------- |
| **GET**    | `/users/read.php`   | Menampilkan semua user        |
| **POST**   | `/users/create.php` | Menambahkan user baru         |
| **PUT**    | `/users/update.php` | Memperbarui data user         |
| **DELETE** | `/users/delete.php` | Menghapus user berdasarkan ID |

---

## 🧪 Contoh Penggunaan di Postman

### 1. Create (POST)

**URL:** `http://localhost/api_user/users/create.php`

```json
{
    "username": "Marsel",
    "email": "marsel@gmail.com",
    "password": "12345"
}
```

---

### 2. Read (GET)

**URL:** `http://localhost/api_user/users/read.php`

Hasil:

```json
{
    "success": true,
    "data": [
        { "id": 1, "username": "Marsel", "email": "marsel@gmail.com" }
    ]
}
```

---

### 3. Update (PUT)

**URL:** `http://localhost/api_user/users/update.php`

```json
{
    "id": 1,
    "username": "Marsel Update",
    "email": "marsel_new@gmail.com",
    "password": "baru123"
}
```

---

### 4. Delete (DELETE)

**URL:** `http://localhost/api_user/users/delete.php`

```json
{
    "id": 1
}
```

---

## 💾 Cara Jalankan

1. Jalankan **Laragon / XAMPP**
2. Buat database `api_user_db`
3. Import tabel `users`
4. Simpan project di folder `www` atau `htdocs`
5. Uji lewat Postman:

   * `http://localhost/api_user/users/create.php`
   * `http://localhost/api_user/users/read.php`
   * `http://localhost/api_user/users/update.php`
   * `http://localhost/api_user/users/delete.php`

---

## 👨‍💻 Dibuat oleh

**Marsel Sisang**
Untuk tugas kuliah: *Pemrograman Web Backend (CRUD PHP REST API)*
Universitas Kristen Indonesia Toraja

```

---

Kamu mau saya bantu tambahkan juga file `index.php` supaya semua endpoint bisa diakses dari **satu file saja (pakai method GET, POST, PUT, DELETE)**, biar lebih keren waktu push ke GitHub?
```
