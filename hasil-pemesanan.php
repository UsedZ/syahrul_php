<?php
    include 'koneksi/konf.php';
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM pesanan WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($pes = mysqli_fetch_assoc($result)) {
            $nama = $pes['nama_pemesanan'];
            $jenisKelamin = $pes['jenis_kelamin'];
            $nomoridentitas = $pes['nomor_identitas'];
            $tipeKamar = $pes['tipe_kamar'];
            $durasiMenginap = $pes['durasi_menginap'];
            $diskon = $pes['diskon'];
            $totalBayar = $pes['total_harga'];
        } else {
            echo "<script>alert('Data pemesanan tidak ditemukan.'); window.location.href = 'index.php';</script>";
            exit;
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('ID tidak valid.'); window.location.href = 'index.php';</script>";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Pemesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .detail-label {
      font-weight: bold;
      margin-right: 5px;
    }
    .detail-value {
      color: #6c757d;
    }
    .detail-row {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="card shadow">
      <div class="card-header bg-primary text-white text-center">
        <h5>Detail Pemesanan</h5>
      </div>
      <div class="card-body">
        <div class="detail-row">
          <span class="detail-label">Nama Pemesan:</span>
          <span class="detail-value"><?php echo $nama?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Nomor Identitas:</span>
          <span class="detail-value"><?php echo $nomoridentitas?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Jenis Kelamin:</span>
          <span class="detail-value"><?php echo $jenisKelamin?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Tipe Kamar:</span>
          <span class="detail-value"><?php echo $tipeKamar?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Durasi Penginapan:</span>
          <span class="detail-value"><?php echo $durasiMenginap?> Hari</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Discount:</span>
          <span class="detail-value"><?php echo $diskon?>%</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Total Bayar:</span>
          <span class="detail-value"><?php echo $totalBayar?></span>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
