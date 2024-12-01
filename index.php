<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jenis Kamar Hotel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Hotel Bahagia</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#tentangKami">Tentang Kami</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Konten Utama -->
  <div class="container mt-5" id="kamar">
    <h2 class="text-center mb-4">Jenis Kamar Hotel Bahagia</h2>
    <div class="row">
      
      <!-- Kamar Standar -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="assets/images/standar.jpg" class="card-img-top" alt="Kamar Standar">
          <div class="card-body">
            <h5 class="card-title">Kamar Standar</h5>
            <p class="card-text">Kamar nyaman dengan fasilitas dasar untuk penginapan yang ekonomis.</p>
            <a href="assets/videos/standar.mp4" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal" onclick="setVideo('assets/videos/standar.mp4')">Tonton Video</a>
            <a href="pemesanan.php?tipeKamar=Standar" class="btn btn-success mt-2">Pesan Kamar</a>
          </div>
        </div>
      </div>

      <!-- Kamar Deluxe -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="assets/images/deluxe.jpg" class="card-img-top" alt="Kamar Deluxe">
          <div class="card-body">
            <h5 class="card-title">Kamar Deluxe</h5>
            <p class="card-text">Kamar mewah dengan fasilitas tambahan dan pemandangan yang indah.</p>
            <a href="assets/videos/deluxe.mp4" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal" onclick="setVideo('assets/videos/deluxe.mp4')">Tonton Video</a>
            <a href="pemesanan.php?tipeKamar=Deluxe" class="btn btn-success mt-2">Pesan Kamar</a>
          </div>
        </div>
      </div>

      <!-- Kamar Family -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="assets/images/family.jpg" class="card-img-top" alt="Kamar Family">
          <div class="card-body">
            <h5 class="card-title">Kamar Family</h5>
            <p class="card-text">Kamar luas yang cocok untuk keluarga dengan fasilitas lengkap.</p>
            <a href="assets/videos/family.mp4" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal" onclick="setVideo('assets/videos/family.mp4')">Tonton Video</a>
            <a href="pemesanan.php?tipeKamar=Family" class="btn btn-success mt-2">Pesan Kamar</a>
          </div>
        </div>
      </div>

    </div>

    <!-- Modal untuk menampilkan video -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="videoModalLabel">Video Kamar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <video id="videoPlayer" class="w-100" controls>
              <source id="videoSource" src=" " type="video/mp4">
            </video>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-white mt-5 py-4" id="tentangKami">
    <div class="container text-center">
      <h4 class="mb-3">Tentang Kami</h4>
      <p>
        Hotel Bahagia terletak di Jl. Raya Kebon Jeruk No.123, Kota Bahagia, Indonesia.<br>
        Hubungi kami di: 
      </p>
      <p>
        <strong>Telepon:</strong> (021) 123-4567<br>
        <strong>Email:</strong> info@hotelbahagia.com
      </p>
      <p>© 2024 Hotel Bahagia. Semua Hak Dilindungi.</p>
    </div>
  </footer>

  <script>
    function setVideo(videoFile) {
      document.getElementById('videoSource').src = videoFile;
      document.getElementById('videoPlayer').load();
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
