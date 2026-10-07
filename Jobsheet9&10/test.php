<?php
// 1. Konfigurasi Koneksi Database
$host = '127.0.0.1';
$port = '5432';
$db   = 'pertemuan1';
$user = 'basis_data';
$pass = 'Ibennn';

$dsn = "pgsql:host=$host;port=$port;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // 2. Insert Data Baru via Kode
    $sqlInsert = "INSERT INTO mahasiswa (nim, nama, angkatan) 
                  VALUES (:nim, :nama, :angkatan)
                  ON CONFLICT (nim) DO NOTHING"; // Cegah error duplikasi saat halaman di-refresh

    $stmtInsert = $pdo->prepare($sqlInsert);
    $stmtInsert->execute([
        ':nim'      => '230101001',
        ':nama'     => 'Budi Santoso',
        ':angkatan' => 2023
    ]);

    // 3. Ambil Semua Data dari Tabel Mahasiswa
    $stmtSelect = $pdo->query("SELECT nim, nama, angkatan FROM mahasiswa ORDER BY angkatan DESC");
    $daftarMahasiswa = $stmtSelect->fetchAll();

} catch (PDOException $e) {
    die("Error Database: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 600px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>

    <h2>Daftar Mahasiswa (PostgreSQL via PHP)</h2>

    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Angkatan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($daftarMahasiswa)): ?>
                <tr>
                    <td colspan="3">Data masih kosong.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($daftarMahasiswa as $mhs): ?>
                    <tr>
                        <td><?= htmlspecialchars($mhs['nim']) ?></td>
                        <td><?= htmlspecialchars($mhs['nama']) ?></td>
                        <td><?= htmlspecialchars($mhs['angkatan']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>

