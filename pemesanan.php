<?php
  include 'koneksi/konf.php';
  if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $nomoridentitas = $_POST['nomoridentitas'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $tipeKamar = $_POST['tipeKamar'];
    $durasiMenginap = $_POST['durasiMenginap'];
    $diskon = ($_POST['durasiMenginap'] >= 3) ? 10 : 0;
    $total = $_POST['totalBayar'];
    $totalSetelahDiskon = $total - ($total * 0.10);
    $tanggalPesan = $_POST['tanggalPesan'];
    $query = "INSERT INTO pesanan (nama_pemesanan, nomor_identitas, jenis_kelamin, tipe_kamar, durasi_menginap, diskon, total_harga, tanggal) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "ssssiiis", $nama, $nomoridentitas, $jenisKelamin, $tipeKamar, $durasiMenginap, $diskon, $totalSetelahDiskon, $tanggalPesan);
        
        if (mysqli_stmt_execute($stmt)) {
            $last_id = mysqli_insert_id($conn);
            echo "<script>
                    alert('Pemesanan berhasil! Terima kasih telah memesan kamar.');
                    window.location.href = 'hasil-pemesanan.php?id=" . $last_id . "';
                  </script>";
        } else {
            echo "<script>
                    alert('Pemesanan gagal! Terjadi kesalahan.');
                    window.history.back();
                  </script>";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pemesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header text-center bg-primary text-white">
        <h5>Form Pemesanan</h5>
      </div>
      <div class="card-body">
        <form id="pemesananForm" method="POST">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Pemesan</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenisKelamin" id="laki" value="Laki-Laki" required>
                <label class="form-check-label" for="laki">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenisKelamin" id="perempuan" value="Perempuan" required>
                <label class="form-check-label" for="perempuan">Perempuan</label>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="nomorIdentitas" class="form-label">Nomor Identitas (16 Digit)</label>
            <input type="text" class="form-control" id="nomorIdentitas" name="nomoridentitas" placeholder="Masukkan nomor identitas" required>
            <div id="nomorIdentitasError" class="text-danger mt-1" style="display:none;">Isian salah.. data harus 16 digit</div>
          </div>

          <div class="mb-3">
            <label for="tipeKamar" class="form-label">Tipe Kamar</label>
            <select class="form-select" id="tipeKamar" name="tipeKamar" required>
              <option value="Standar">Standar</option>
              <option value="Deluxe">Deluxe</option>
              <option value="Family">Family</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" placeholder="Harga akan otomatis terisi" disabled>
          </div>

          <div class="mb-3">
            <label for="tanggalPesan" class="form-label">Tanggal Pesan</label>
            <input type="date" class="form-control" id="tanggalPesan" name="tanggalPesan" required>
            <div id="tanggalPesanError" class="text-danger mt-1" style="display:none;">Format tanggal salah, harus sesuai dengan tanggal kontol</div>
          </div>

          <div class="mb-3">
            <label for="durasiMenginap" class="form-label">Durasi Menginap</label>
            <input type="text" class="form-control" id="durasiMenginap" name="durasiMenginap" required>
            <div id="durasiMenginapError" class="text-danger mt-1" style="display:none;">Harus isi angka</div>
          </div>

          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="breakfast">
            <label class="form-check-label" for="breakfast">Termasuk Breakfast</label>
          </div>

          <div class="mb-3">
            <label for="totalBayar" class="form-label">Total Bayar</label>
            <input type="text" class="form-control" id="totalBayar" name="totalBayar">
          </div>

          <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-primary" id="hitungTotalBayar">Hitung Total Bayar</button>
            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const tipeKamar = document.getElementById("tipeKamar");
    const harga = document.getElementById("harga");
    const durasiMenginap = document.getElementById("durasiMenginap");
    const totalBayar = document.getElementById("totalBayar");
    const breakfast = document.getElementById("breakfast");
    const hitungTotalBayar = document.getElementById("hitungTotalBayar");
    const nomorIdentitas = document.getElementById("nomorIdentitas");
    const tanggalPesan = document.getElementById("tanggalPesan");
    const form = document.getElementById("pemesananForm");

    let selectedPrice = 0;

    // Update harga berdasarkan tipe kamar
    tipeKamar.addEventListener("change", function () {
      if (tipeKamar.value === 'Standar') {
          selectedPrice = 500000;
      } else if (tipeKamar.value === 'Deluxe') {
          selectedPrice = 700000;
      } else {
          selectedPrice = 1000000;
      }
      harga.value = selectedPrice;
    });

    // Validasi Nomor Identitas
    durasiMenginap.addEventListener("input", function () {
      const errorMessage = document.getElementById("durasiMenginapError");
      if (isNaN(durasiMenginap.value) || durasiMenginap.value === "") {
        errorMessage.style.display = "block";
      } else {
        errorMessage.style.display = "none";
      }
    });

    // Validasi Nomor Identitas
    nomorIdentitas.addEventListener("input", function () {
      const errorMessage = document.getElementById("nomorIdentitasError");
      if (nomorIdentitas.value.length !== 16) {
        errorMessage.style.display = "block";
      } else {
        errorMessage.style.display = "none";
      }
    });

          // Validasi Tanggal Pesan
      tanggalPesan.addEventListener("input", function () {
        const errorMessage = document.getElementById("tanggalPesanError");
        const datePattern = /^\d{4}-\d{2}-\d{2}$/; // Menggunakan format YYYY-MM-DD
        const inputDate = new Date(tanggalPesan.value);
        const today = new Date();
        today.setHours(0, 0, 0, 0); // Set waktu hari ini ke 00:00:00

        // Cek apakah tanggal sesuai format dan tidak lebih kecil dari hari ini
        if (!datePattern.test(tanggalPesan.value) || inputDate < today) {
          errorMessage.style.display = "block";
        } else {
          errorMessage.style.display = "none";
        }
      });

    // Hitung Total Bayar
    hitungTotalBayar.addEventListener("click", function () {
      let hargaPerMalam = parseInt(harga.value);
      let durasi = parseInt(durasiMenginap.value);
      let total = hargaPerMalam * durasi;

      if (breakfast.checked) {
        total += 80000;
      }

      totalBayar.value = total;
    });

    // Form submit validation
    form.addEventListener("submit", function(event) {
      // Validasi form sebelum submit
      if (nomorIdentitas.value.length !== 16 || isNaN(durasiMenginap.value) || durasiMenginap.value === "" || !/^\d{4}-\d{2}-\d{2}$/.test(tanggalPesan.value)) {
        event.preventDefault();
        alert("Tolong periksa kembali form Anda!");
      }
    });

    window.onload = function() {
      // Menangkap parameter URL
      const urlParams = new URLSearchParams(window.location.search);
      const tipeKamarParam = urlParams.get('tipeKamar');

      if (tipeKamarParam) {
        const tipeKamarSelect = document.getElementById("tipeKamar");

        // Set nilai select sesuai dengan parameter URL
        if (tipeKamarParam === 'Standar' || tipeKamarParam === 'Deluxe' || tipeKamarParam === 'Family') {
          tipeKamarSelect.value = tipeKamarParam;
          
          // Update harga otomatis berdasarkan tipe kamar yang dipilih
          updateHarga(tipeKamarParam);
        }
      }
    };

    function updateHarga(tipeKamar) {
      const harga = document.getElementById("harga");

      let hargaPerMalam = 0;
      
      if (tipeKamar === 'Standar') {
        hargaPerMalam = 500000;
      } else if (tipeKamar === 'Deluxe') {
        hargaPerMalam = 700000;
      } else if (tipeKamar === 'Family') {
        hargaPerMalam = 1000000;
      }

      harga.value = hargaPerMalam;
    }
    
    function resetForm() {
      document.getElementById("pemesananForm").reset(); // Reset semua input
      harga.value = ""; // Reset harga ke nilai kosong
      totalBayar.value = ""; // Reset total bayar ke nilai kosong
      document.getElementById("nomorIdentitasError").style.display = "none"; // Sembunyikan error
      document.getElementById("durasiMenginapError").style.display = "none";
      document.getElementById("tanggalPesanError").style.display = "none";
    }

    // Tambahkan listener untuk tombol "Cancel"
    const resetButton = document.querySelector("button[type='reset']");
    resetButton.addEventListener("click", resetForm);

  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>