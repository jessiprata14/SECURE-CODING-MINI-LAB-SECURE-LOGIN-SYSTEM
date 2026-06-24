# SECURE-CODING-MINI-LAB-SECURE-LOGIN-SYSTEM
This MiniLab is an example of creating a secure login system by implementing rate limiting, password hash, and captcha.

(English)
# Getting Started

## Prerequisites

Before running the application, make sure the following software is installed on your system:

- XAMPP (Windows) or LAMP Stack (Linux/macOS)
- Apache
- PHP
- MySQL
- Git
- The database file (`.sql`) included in this repository

---

## 1️⃣ Clone the Repository

Open a terminal and run:

```bash
git clone https://github.com/username/repo.git
```

If you are using XAMPP, place the project inside the `htdocs` directory.

Example:

```powershell
git clone https://github.com/username/repo.git
Move-Item .\repo 'C:\xampp\htdocs\PengkodeanAman_MiniLab'
```

---

## 2️⃣ Configure the Project

Make sure the project folder is located at:

```text
C:\xampp\htdocs\PengkodeanAman_MiniLab
```

The application should then be accessible via:

```text
http://localhost/PengkodeanAman_MiniLab/
```

---

## 3️⃣ Import the Database

### Using phpMyAdmin

1. Open:

```text
http://localhost/phpmyadmin
```

2. Create a new database.
3. Select the newly created database.
4. Navigate to the **Import** tab.
5. Upload the `.sql` file provided in this repository.
6. Click **Go**.

### Using Command Line (Optional)

```bash
mysql -u root -p
CREATE DATABASE database_name;
exit
```

```bash
mysql -u root -p database_name < path/database.sql
```

---

## 4️⃣ Configure the Database Connection

Open:

```text
function.php
```

Update the database configuration as needed:

```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "database_name";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
```

> Ensure that the database name matches the one you imported earlier.

---

## 5️⃣ Start the Server

1. Open **XAMPP Control Panel**.
2. Start:
   - Apache
   - MySQL
3. Verify that both services are running without errors.

---

## 6️⃣ Access the Application

Open your browser and visit:

```text
http://localhost/PengkodeanAman_MiniLab/
```

Or access the registration page directly:

```text
http://localhost/PengkodeanAman_MiniLab/register.php
```

---

## 🛠️ Troubleshooting

### Blank Page or HTTP 500 Error

Temporarily enable PHP error reporting by adding the following code to the application's entry file:

```php
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
```

### Check Error Logs

Open:

```text
XAMPP Control Panel → Logs
```

Then review:

- `apache_error.log`
- `php_error_log`

---

## 💡 Notes

- If Apache is running on a non-default port (e.g., 8080), use:

```text
http://localhost:8080/PengkodeanAman_MiniLab/
```

- If your MySQL root account has a password, update the database credentials in `function.php`.
- For better security, consider storing database credentials in environment variables or a separate configuration file such as `.env`.

---

This guide is intended to help users set up and run the application in a local development environment.
````

Untuk README GitHub tugas kuliah, versi ini sudah mengikuti gaya dokumentasi open-source yang umum digunakan dan mudah dipahami oleh dosen maupun developer lain.

---------------------------------------------------------------------------------------------------------------------------
(Indonesian)
# Cara Menjalankan Sistem

## Prasyarat
Pastikan perangkat telah terinstal:
- XAMPP (Windows) atau LAMP Stack (Linux/macOS)
- Apache
- PHP
- MySQL
- Git
- File database (`.sql`) yang tersedia pada repository

## 1️⃣ Clone Repository

Buka terminal atau Command Prompt, lalu jalankan:

```bash
git clone https://github.com/username/repo.git
```

Jika menggunakan XAMPP, letakkan project di dalam folder `htdocs`.

Contoh:

```powershell
git clone https://github.com/username/repo.git
Move-Item .\repo 'C:\xampp\htdocs\PengkodeanAman_MiniLab'
```

---

## 2️⃣ Konfigurasi Project

Pastikan folder project berada pada:

```text
C:\xampp\htdocs\PengkodeanAman_MiniLab
```

Sehingga aplikasi dapat diakses melalui:

```text
http://localhost/PengkodeanAman_MiniLab/
```

---

## 3️⃣ Import Database

### Melalui phpMyAdmin

1. Buka:

```text
http://localhost/phpmyadmin
```

2. Buat database baru.
3. Pilih database yang telah dibuat.
4. Buka tab **Import**.
5. Unggah file `.sql` yang tersedia pada repository.
6. Klik **Go**.

### Melalui Command Line (Opsional)

```bash
mysql -u root -p
CREATE DATABASE nama_database;
exit
```

```bash
mysql -u root -p nama_database < path/database.sql
```

---

## 4️⃣ Konfigurasi Koneksi Database

Buka file:

```text
function.php
```

Sesuaikan konfigurasi database:

```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "nama_database";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
```

> Pastikan nama database sesuai dengan database yang telah diimport.

---

## 5️⃣ Menjalankan Server

1. Buka **XAMPP Control Panel**.
2. Jalankan:

   * Apache
   * MySQL
3. Pastikan kedua layanan berjalan tanpa error.

---

## 6️⃣ Akses Aplikasi

Buka browser dan akses:

```text
http://localhost/PengkodeanAman_MiniLab/
```

atau langsung ke halaman registrasi:

```text
http://localhost/PengkodeanAman_MiniLab/register.php
```

---

## 🛠️ Troubleshooting

### Halaman Kosong / Error 500

Tambahkan kode berikut pada file utama aplikasi untuk menampilkan error:

```php
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
```

### Melihat Log Error

Buka:

```text
XAMPP Control Panel → Logs
```

Kemudian periksa:

* `apache_error.log`
* `php_error_log`

---

## 💡 Catatan

* Jika Apache menggunakan port selain **80**, gunakan URL yang sesuai.

Contoh:

```text
http://localhost:8080/PengkodeanAman_MiniLab/
```

* Jika akun MySQL memiliki password, sesuaikan konfigurasi pada `function.php`.
* Untuk keamanan yang lebih baik, kredensial database sebaiknya disimpan menggunakan file konfigurasi terpisah seperti `.env`.

---
Dokumentasi ini dibuat untuk memudahkan proses instalasi dan menjalankan aplikasi pada lingkungan pengembangan lokal.
