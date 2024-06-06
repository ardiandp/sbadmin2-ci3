<?php
require 'api.php';

// URL API dari aplikasi CodeIgniter Anda
$apiUrl = 'http://localhost/web2/api/barang';

// Memanggil API untuk mengambil data barang
$response = callAPI('GET', $apiUrl);
$barang = json_decode($response, true);

// Proses form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = array(
        'kode' => $_POST['kode'],
        'nama_barang' => $_POST['nama_barang'],
        'harga' => $_POST['harga']
    );

    $json_data = json_encode($data);
    $response = callAPI('POST', $apiUrl . '/create', $json_data);
    $result = json_decode($response, true);

    if ($result['status'] == 'success') {
        $message = "Data barang berhasil ditambahkan!";
        // Refresh data barang
        $response = callAPI('GET', $apiUrl);
        $barang = json_decode($response, true);
    } else {
        $message = "Error: " . $result['message'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        .form-container {
            margin-bottom: 20px;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
            width: 300px;
        }
        .form-container form input {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Data Barang</h1>

    <!-- Form Input -->
    <div class="form-container">
        <h2>Tambah Barang</h2>
        <?php if (isset($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <input type="text" name="kode" placeholder="Kode" required>
            <input type="text" name="nama_barang" placeholder="Nama Barang" required>
            <input type="number" step="0.01" name="harga" placeholder="Harga" required>
            <button type="submit">Tambah</button>
        </form>
    </div>

    <!-- Tabel Data Barang -->
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($barang)) : ?>
                <?php foreach ($barang as $item) : ?>
                    <tr>
                        <td><?php echo $item['kode']; ?></td>
                        <td><?php echo $item['nama_barang']; ?></td>
                        <td><?php echo $item['harga']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3">Tidak ada data barang.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
